# Stage 1: Build assets using Node
FROM node:18 as node-builder

# Set working directory
WORKDIR /app

# Copy only frontend-related files
COPY package.json package-lock.json vite.config.js ./
COPY resources/ resources/
COPY public/ public/
COPY .env .env

# Install Node dependencies and build assets with Vite
RUN npm install && npm run build


# Stage 2: Setup Laravel app with PHP and Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Set Apache DocumentRoot to Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Copy Laravel app files
COPY . .

# Copy built Vite assets from node builder
COPY --from=node-builder /app/public/build public/build

# Set correct permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]





