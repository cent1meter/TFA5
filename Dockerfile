FROM php:8.3-apache
RUN apt-get update && apt-get install -y --no-install-recommends git unzip libonig-dev libsqlite3-dev libzip-dev \
    && docker-php-ext-install mbstring pdo_sqlite zip opcache \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader \
    && chown -R www-data:www-data storage bootstrap/cache
COPY deploy/apache.conf /etc/apache2/sites-available/000-default.conf
RUN chmod +x deploy/start.sh
ENV APP_ENV=production APP_DEBUG=false LOG_CHANNEL=stderr SESSION_DRIVER=file CACHE_STORE=file
EXPOSE 10000
CMD ["sh", "deploy/start.sh"]
