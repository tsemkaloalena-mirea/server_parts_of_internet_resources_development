FROM composer as build

FROM php:8.0-apache
RUN apt-get update
RUN a2enmod authn_dbd
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get install -y libaprutil1-dbd-mysql

RUN pecl install redis && docker-php-ext-enable redis

RUN apt-get install -y libpng-dev
RUN apt-get install -y zlib1g-dev
RUN docker-php-ext-install gd && docker-php-ext-enable gd
RUN apt-get install -y git unzip

copy --from=build /usr/bin/composer /usr/bin/composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer require fakerphp/faker
RUN composer require amenadiel/jpgraph
#RUN composer dump-autoload