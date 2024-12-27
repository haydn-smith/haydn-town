FROM php:8.3-apache as apache

ARG UID=1000
ARG GID=1000

# configure user and group
RUN delgroup dialout;
RUN groupmod -g ${GID} www-data;
RUN usermod -u ${UID} -g ${GID} www-data;

# install package managers
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY --from=node:22 /usr/local /usr/local

# configure container
WORKDIR /var/www/html
ARG APACHE_DOCUMENT_ROOT=/var/www/html/public
ARG PHP_MEMORY_LIMIT=128M

# install container deps
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl \
    git \
    bash \
    libzip-dev \
    libonig-dev \
    mysql-common \
    libldap2-dev \
    libicu-dev;

# make apache do what it needs to
RUN docker-php-ext-install pdo pdo_mysql intl zip pcntl;
RUN a2enmod rewrite;
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf;
RUN chown -R www-data:www-data /var/www/html;

USER www-data

CMD ["apache2-foreground"]
