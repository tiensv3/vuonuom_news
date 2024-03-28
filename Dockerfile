###############
FROM php:8.2-apache
WORKDIR /var/www/html
RUN apt-get update -y && apt-get install -y
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli
