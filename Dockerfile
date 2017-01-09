############################################################
# Dockerfile to build Appointments
# Based on Ubuntu
############################################################

# Set the base image to Ubuntu
FROM ubuntu:14.04
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


#RUN apt-get update && \
#    apt-get -y upgrade && \
#    DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 php7.0  php7.0-mysql  php7.0-curl  php7.0-mcrypt  php7.0-json php7.0-ldap libapache2-mod-php7.0  php5-zip php7.0-gd php-pear php-auth php-iconv curl phpmyadmin libpcre3-dev wget git vim unzip ntp cron supervisor ssmtp&& \
#    apt-get clean && \
#    update-rc.d apache2 defaults 

RUN apt-get update && \
    apt-get -y upgrade && \
    DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 php5 php5-mysql php5-curl php5-mcrypt php5-json php5-ldap libapache2-mod-php5 php-pear php-auth curl phpmyadmin wget git vim unzip mysql-server ntp cron supervisor && \
    apt-get clean && \
    update-rc.d apache2 defaults && \
php5enmod mcrypt

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

RUN locale-gen en_GB.UTF-8
ENV LANG='en_GB.UTF-8' LANGUAGE='en_GB:en' LC_ALL='en_GB.UTF-8'

# Expose apache.
EXPOSE 80

# Make a directory
RUN mkdir -p /var/www/site

# Copy this repo into place.
ADD info.php /var/www/site

# supervisord config file
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Appointments zip file
ADD ./appointments /var/www/site/appointments

# Update the default apache site with the config we created.
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# Setup supervisord
CMD /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
