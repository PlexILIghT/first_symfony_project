# Dockerfile
FROM php:8.1

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony*/bin/symfony /usr/local/bin/symfony
RUN composer require doctrine/orm
RUN composer require symfony/maker-bundle

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

COPY . .

CMD ["symfony", "server:start", "--no-tls", "--allow-http", "--port=8000", "--address=0.0.0.0"]