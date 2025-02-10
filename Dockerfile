# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip

# Enable Apache mod_rewrite for Laravel
RUN a2enmod rewrite

# Enable SSL module in Apache
RUN a2enmod ssl

# Enable Apache proxy modules
RUN a2enmod proxy
RUN a2enmod proxy_http

# Copy custom Apache configuration and SSL certificates
COPY ./config/rassed-map.conf /etc/apache2/sites-available/rassed-map.conf
# Copy the SSL files into the container
# COPY ./config/rassed-map.crt /etc/ssl/certs/rassed-map.crt
# COPY ./config/rassed-map.key /etc/ssl/private/rassed-map.key

# Enable site and SSL
RUN a2ensite rassed-map.conf

# Copy the application files into the container
COPY . /var/www/html/rassed-map

# Set permissions on the copied files
RUN chown -R www-data:www-data /var/www/html/rassed-map && \
    chmod -R 775 /var/www/html/rassed-map/storage /var/www/html/rassed-map/bootstrap/cache /var/www/html/rassed-map/config/

# Expose port 443 for SSL
EXPOSE 443

# Start Apache in the foreground
CMD ["apache2-foreground"]