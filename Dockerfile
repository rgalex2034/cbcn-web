FROM debian:stretch
WORKDIR /var/www/
RUN apt-get update
RUN yes | apt-get install less vim
RUN yes | apt-get install apache2 php libapache2-mod-php php-mysql
COPY config/apache2/conf/* /etc/apache2/conf-available
RUN a2enmod rewrite
RUN a2enconf cbcn-allow-rewrite
EXPOSE 80
CMD ["apachectl", "-D FOREGROUND"]
