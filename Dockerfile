FROM php:8-fpm
RUN apt-get update && docker-php-ext-install pdo_mysql && apt -y install unzip

# optional - if you want to install composer dependencies at build stage
#COPY ./framework /var/www/app

# copy composer from compser image
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# optional - install dependencies
#RUN cd /var/www/app && composer install
