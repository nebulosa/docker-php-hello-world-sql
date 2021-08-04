FROM php:7.2-apache
COPY app/ /var/www/html/

WORKDIR /usr/local/lib/php/
RUN curl -L https://redbeanphp.com/downloadredbeanversion.php?f=all-drivers | tar xvzf -

EXPOSE 80
