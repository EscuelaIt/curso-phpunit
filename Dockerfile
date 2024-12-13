FROM php:8.2-cli

RUN pecl install xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /app
