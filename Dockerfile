FROM serversideup/php:8.3-fpm-nginx

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

COPY . .

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV NGINX_WEBROOT=/var/www/html/public
ENV NGINX_HTTP_PORT=10000

EXPOSE 10000
