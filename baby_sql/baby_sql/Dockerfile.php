FROM php:8.2-apache

# Install PostgreSQL development files and other necessary dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP PostgreSQL extensions (pdo, pdo_pgsql, php-pgsql)
RUN apt-get update \
  && apt-get install -y libpq-dev \
  && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pgsql pdo pdo_pgsql 

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application files
COPY ./src/ /var/www/html/

# Set proper permissions for the web files
RUN chown -R www-data:www-data /var/www/html/

# Copy flag.txt into the container
COPY flag.txt /var/www/html/flag.txt
RUN chown www-data:www-data /var/www/html/flag.txt

# Configure PHP for error reporting and debugging
# Tắt debug và hiển thị lỗi trong PHP
RUN echo "display_errors = Off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "error_reporting = E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

