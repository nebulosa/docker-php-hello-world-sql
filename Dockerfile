FROM php:7.2-apache
COPY app/ /var/www/html/
COPY composer.json /var/www/html/
COPY --from=composer:2.1.5 /usr/bin/composer /usr/bin/composer


RUN apt-get update -y && apt-get upgrade -y && apt-get install git -y

WORKDIR /var/www/html

RUN composer update

EXPOSE 80
