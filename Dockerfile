FROM php:7.2-fpm-alpine

MAINTAINER Lionertic <udayacharan.20cs@licet.ac.in>

COPY composer.lock composer.json /var/www/html/

WORKDIR /var/www/html

RUN apk --update add wget \
  curl \
  git \
  grep \
  build-base \
  libmemcached-dev \
  libmcrypt-dev \
  libxml2-dev \
  imagemagick-dev \
  pcre-dev \
  libtool \
  make \
  autoconf \
  g++ \
  cyrus-sasl-dev \
  libgsasl-dev \
  supervisor \
  git \
  nodejs \
  nodejs-npm

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql tokenizer xml

RUN pecl channel-update pecl.php.net \
    && pecl install memcached \
    && pecl install imagick \
    && pecl install mcrypt-1.0.1 \
    && docker-php-ext-enable memcached \
    && docker-php-ext-enable imagick \
    && docker-php-ext-enable mcrypt

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -rf /var/cache/apk/*

EXPOSE 9000

CMD ["php-fpm"]
