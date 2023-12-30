FROM php:8.2.1-fpm

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
libpng-dev \
zlib1g-dev \
libxml2-dev \
libzip-dev \
libonig-dev \
libpq-dev \
zip \
curl \
unzip \
&& docker-php-ext-configure gd \
&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install pdo_mysql \
&& docker-php-ext-install mysqli \
&& docker-php-ext-install zip \
&& docker-php-ext-install exif \
&& docker-php-ext-install pdo \
&& docker-php-ext-install pgsql \
&& docker-php-ext-install pdo_pgsql \
&& docker-php-source delete
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN composer install
RUN php artisan migrate --force

CMD ["php","artisan","serve","--host=0.0.0.0"]

