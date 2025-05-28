# Stage 1: Build frontend assets using Node
FROM node:18 as node-builder

WORKDIR /app

COPY package*.json ./
COPY vite.config.js ./
COPY resources/ resources/
COPY public/ public/

RUN npm install && npm run build


# Stage 2: Laravel App with PHP and Apache
FROM php:8.2-apache

WORKDIR /var/www/html

# Install system packages
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set Apache to use Laravel's public directory
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Copy built assets
COPY --from=node-builder /app/public/build public/build

# Install Laravel PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose HTTP port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]






