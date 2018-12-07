FROM debian:stretch
WORKDIR /var/www/
RUN apt-get update
RUN yes | apt-get install less vim
RUN yes | apt-get install apache2 php libapache2-mod-php php-mysql php-imagick
COPY config/apache2/conf/* /etc/apache2/conf-available
RUN a2enmod rewrite
RUN a2enmod ssl
RUN a2ensite default-ssl.conf
RUN a2enconf cbcn-allow-rewrite
EXPOSE 80
EXPOSE 443
RUN mkdir /var/www/html/static
RUN chown -R www-data /var/www/html/static
CMD ["apachectl", "-D FOREGROUND"]
