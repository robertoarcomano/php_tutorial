FROM php:8.3-apache

# # install system packages + mysql
RUN apt-get update && apt-get install -y --allow-unauthenticated \
    default-mysql-server \
    mc \
    supervisor \
    vim \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql
    
# # enable apache mod_rewrite (tipico legacy)
RUN a2enmod rewrite expires headers

# # copy supervisor config
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# # apache2 config and code
RUN chown -R www-data:www-data /var/www/html/
RUN /etc/init.d/apache2 restart

# # working dir
WORKDIR /var/www/html

CMD ["/usr/bin/supervisord", "-n"]
