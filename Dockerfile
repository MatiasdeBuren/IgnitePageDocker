FROM php:7.4-apache

COPY ./ /var/www/html/

RUN docker-php-ext-install mysqli

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip     

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]