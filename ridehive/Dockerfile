# Stage 1: Build Stage
FROM php:8.2-fpm AS build

WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    libzip-dev \
    && docker-php-ext-install pdo_mysql bcmath mbstring \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js 20.x and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Copy application files to the container
COPY . .

# Install PHP dependencies (Composer)
RUN composer install --no-dev --optimize-autoloader

# Install Node.js dependencies
RUN npm install

# Compile assets using Vite
RUN npm run build

# Stage 2: Production Stage
FROM php:8.2-fpm

WORKDIR /var/www

# Copy over the application from the build stage
COPY --from=build /var/www /var/www

# Set the correct permissions for Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Set permissions for node_modules to allow execution of Vite
RUN chmod -R 755 node_modules

# Clear and cache configurations, routes, and views for better performance
RUN php artisan config:clear && php artisan config:cache
RUN php artisan route:clear && php artisan route:cache
RUN php artisan view:clear && php artisan view:cache

# Ensure the Laravel storage and cache directories are writable
RUN chmod -R 775 storage bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Start the application
CMD php artisan serve --host=0.0.0.0 --port=8000
