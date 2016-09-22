############################################################
# Dockerfile to build Appointments
# Based on Ubuntu
############################################################

# Set the base image to Ubuntu
FROM ubuntu:latest

#    Potential Tags : See https://github.com/docker-library/docs/blob/master/ubuntu/tag-details.md
#    ubuntu:12.04.5
#    ubuntu:12.04
#    ubuntu:precise-20160707
#    ubuntu:precise
#    ubuntu:14.04.4
#    ubuntu:14.04
#    ubuntu:trusty-20160711
#    ubuntu:trusty
#    ubuntu:15.10
#    ubuntu:wily-20160706
#    ubuntu:wily
#    ubuntu:16.04
#    ubuntu:xenial-20160713
#    ubuntu:xenial
#    ubuntu:latest
#    ubuntu:16.10
#    ubuntu:yakkety-20160717
#    ubuntu:yakkety
#    ubuntu:devel

MAINTAINER Saj Issa <saj.issa@gmail.com>

################## BEGIN INSTALLATION ######################


RUN apt-get update && \
    apt-get -y upgrade && \
    DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 php7.0  php7.0-mysql  php7.0-curl  php7.0-mcrypt  php7.0-json libapache2-mod-php7.0  php7.0-zip php7.0-gd php-pear php-auth curl phpmyadmin libpcre3-dev wget git vim unzip ntp cron ssmtp&& \
    apt-get clean && \
    update-rc.d apache2 defaults 

RUN pear install DB    

# php5    php5-mysql    php5-curl    php5-mcrypt    php5-json    libapache2-mod-php5    php-pear php-auth curl phpmyadmin
# php7.0  php7.0-mysql  php7.0-curl  php7.0-mcrypt  php7.0-json  libapache2-mod-php7.0  php-pear php-auth curl phpmyadmin

##################### INSTALLATION END #####################

# Manually set up the apache environment variables
RUN mkdir -p /var/lock/apache2 /var/run/apache2 /etc/supervisor/conf.d/
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Expose apache.
EXPOSE 80

# Make a directory
RUN mkdir -p /var/www/site

# Copy this repo into place.
ADD info.php /var/www/site


# Appointments zip file
ADD appointments.zip /home
RUN unzip /home/appointments.zip -d /var/www/site

# php changes
RUN sed -i.bak 's/upload_max_filesize = 2M/upload_max_filesize = 32M/g' /etc/php/7.0/apache2/php.ini
RUN sed -i.bak 's/post_max_size = 8M/post_max_size = 32M/g' /etc/php/7.0/apache2/php.ini
RUN sed -i.bak 's/; max_input_vars = 1000/max_input_vars = 10000/g' /etc/php/7.0/apache2/php.ini

# Update the default apache site with the config we created.
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

