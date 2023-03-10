FROM php:7.1-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    libmagickwand-dev zlib1g-dev libzip-dev unzip --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer