FROM php:7.2-apache
COPY app/ /var/www/html/
COPY composer.json /var/www/html/

WORKDIR /root

RUN apt-get update -y && apt-get upgrade -y && apt-get install git -y &&\
    curl https://raw.githubusercontent.com/composer/getcomposer.org/11a3bc677c1e6f2b120578d61b780aed7bfdff58/web/installer | php -- --quiet &&\
    mv composer.phar /usr/local/bin/composer &&\
    chmod +x /usr/local/bin/composer

WORKDIR /var/www/html

RUN composer update

EXPOSE 80
