FROM debian:stretch
WORKDIR /var/www/
RUN apt-get update
RUN yes | apt-get install apache2 php libapache2-mod-php php-mysql
EXPOSE 80
CMD ["apachectl", "-D FOREGROUND"]
