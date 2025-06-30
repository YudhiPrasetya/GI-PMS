FROM php:7.4.33-apache

RUN a2enmod rewrite

WORKDIR /var/www/html/GI-PMS-wo

COPY . /var/www/html/GI-PMS-wo

RUN docker-php-ext-install mysqli

RUN chown -R www-data:www-data /var/www/html/GI-PMS-wo && chmod -R 755 /var/www/html/GI-PMS-wo

EXPOSE 80

