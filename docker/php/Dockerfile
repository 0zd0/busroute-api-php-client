FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    autoconf \
    build-essential

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug

# COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www/html
