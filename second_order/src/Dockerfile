FROM php:8.2-apache

# Cài đặt MySQLi và các phần mở rộng cần thiết
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy mã nguồn vào container
COPY . /var/www/html/
