FROM php:7.2-apache

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install mysqli pdo_mysql

RUN mkdir /app \
 && mkdir /app/bookapp-demo \
 && mkdir /app/bookapp-demo/www

COPY www/ /app/bookapp-demo/www/

RUN cp -r /app/bookapp/www/* /var/www/html/.
