# PHP 8.2.35 fixes CVE-2026-109618 and CVE-2026-109619 (php2shell). Pinned by
# digest so a stale cached tag cannot bring back an unfixed build.
FROM php:8.2.35-fpm@sha256:a58479410c94b3f0f7dfacc27fba8befc122290743fd0eb8c88a99ff2a0b1ba1 AS base

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2@sha256:d0c32820c62cc860fddd22adceed4eeda7698b093a7a88d503414172ce400626 /usr/bin/composer /usr/bin/composer

# Session upload progress is one known route to CVE-2026-109619; this app
# doesn't use it. Set in php.ini so it applies before a request is parsed.
COPY docker/php/zz-hardening.ini /usr/local/etc/php/conf.d/zz-hardening.ini

COPY . /var/www/html
COPY .env.docker /var/www/html/.env

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
