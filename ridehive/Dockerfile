# Use PHP 8.2 with Nginx for production
FROM php:8.2-fpm

# Set the working directory
WORKDIR /var/www

# Install system dependencies, MySQL PDO extension, and Node.js 20.x
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    supervisor \
    && docker-php-ext-install pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js 20.x and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    rm -rf /var/lib/apt/lists/*

# Copy application files to the container
COPY . .

# Set the correct permissions for Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Configure Git to allow safe directories
RUN git config --global --add safe.directory /var/www

# Clean up and reset the vendor directory to avoid conflicts
RUN rm -rf /var/www/vendor && \
    mkdir -p /var/www/vendor

# Install PHP dependencies, including Laravel Breeze
RUN composer install --no-dev --optimize-autoloader && \
    composer require laravel/breeze --dev && \
    php artisan breeze:install blade
    
RUN composer require stripe/stripe-php

# Install Node.js dependencies
RUN npm install

# Install TailwindCSS, PostCSS, Autoprefixer, and Vite
RUN npm install tailwindcss postcss autoprefixer vite && \
    chmod +x ./node_modules/.bin/* && \
    npx tailwindcss init

# Compile assets using Vite
RUN chmod +x ./node_modules/.bin/vite && npm run build

# Clear and cache configurations, routes, and views for better performance
RUN php artisan config:clear && php artisan config:cache && \
    php artisan route:clear && php artisan route:cache && \
    php artisan view:clear && php artisan view:cache && \
    php artisan optimize

# Ensure the Laravel storage and cache directories are writable
RUN chmod -R 775 storage bootstrap/cache



# Use Supervisord to serve Laravel
CMD supervisord -c /etc/supervisor/conf.d/supervisord.conf

# Expose port 8000
EXPOSE 8000
