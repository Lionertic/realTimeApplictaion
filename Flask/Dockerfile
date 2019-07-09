FROM python:2.7

MAINTAINER Lionertic <udayacharan.20cs@licet.ac.in>

# install base packs
# apache.wsgi python pip
RUN apt-get clean && apt-get update ; \
    apt-get install -y apache2 libapache2-mod-wsgi python-pip python-dev ; \
    apt-get clean ; \
    pip install --no-cache-dir --upgrade pip

# enable apache modules
RUN a2enmod wsgi rewrite

# setup apache environment
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# setup apache default wsgi vhost
COPY ./Flask/apache2-vhost-wsgi.conf /etc/apache2/sites-available/000-default.conf

# expose apache port
EXPOSE 80

# clean apt cache
RUN apt-get clean

# pip install app requirements
COPY ./Flask/app/requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

# upload app to image
ADD ./Flask/app /var/www/html
WORKDIR /var/www/html

# run flask app on apache
CMD /usr/sbin/apache2ctl -D FOREGROUND
