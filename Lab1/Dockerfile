FROM php:8.1-apache

# Cài đặt extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy mã nguồn vào thư mục của container
COPY ./app /var/www/html/

# Phân quyền cho thư mục
RUN chown -R www-data:www-data /var/www/html
