# Use the official PHP image with Apache
FROM php:8.2-apache

# Install required PHP extensions for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory to the Apache document root
WORKDIR /var/www/html

# Copy the application files into the container
COPY ./src/ /var/www/html/

# Copy the Apache virtual host configuration file into the container
COPY ./virtual_host.conf /etc/apache2/sites-available/000-default.conf

# Change ownership of files to www-data (Apache user)
RUN chown -R www-data:www-data /var/www/html

# Set permissions for directories (755 for directories)
RUN find /var/www/html -type d -exec chmod 755 {} +

# Set permissions for files (644 for files)
RUN find /var/www/html -type f -exec chmod 644 {} +

# Expose port 80 for the web server
EXPOSE 80

# Ensure Apache runs in the foreground
CMD ["apache2-foreground"]
