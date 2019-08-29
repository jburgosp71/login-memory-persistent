FROM composer as backend
WORKDIR /app

copy composer.json composer.lock /app/
RUN composer install \
    --ignore-platform-reqs \
    --no-ansi \
    --no-autoloader \
    --no-interaction \
    --no-scripts

COPY . /app/
RUN composer dump-autoload -o -a

FROM php:7.2-cli

WORKDIR /var/www/html/login-memory-persistent

COPY --from=backend /app /var/www/html/login-memory-persistent/
ADD src /var/www/html/login-memory-persistent/src
ADD tests /var/www/html/login-memory-persistent/tests