FROM php:7.4.6-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
ADD html /var/www/html