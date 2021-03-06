
FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN ./configure --with-pdo-pgsql

RUN docker-php-ext-install pdo pdo_pgsql