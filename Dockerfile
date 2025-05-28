# Stage 1: Build Frontend assets
FROM node:18 as node

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2: Laravel app with Apache and PHP
FROM php:8.2-apache

# Enable PHP extensions required by Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libpq-dev libonig-dev zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy Laravel app from node build stage
COPY --from=node /app /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Serve Laravel using Apache
EXPOSE 80
CMD ["apache2-foreground"]







