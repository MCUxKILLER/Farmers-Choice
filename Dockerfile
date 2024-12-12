FROM php:8.2-apache

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Add custom Apache configuration to set DirectoryIndex
RUN echo "DirectoryIndex index.html index.php" > /etc/apache2/conf-available/custom-directory-index.conf \
    && a2enconf custom-directory-index

# Copy project files to the Apache server directory
COPY . /var/www/html/

# Set permissions for the web directory
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Expose port 80 to allow HTTP traffic
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]

