FROM composer
FROM php:7.3-fpm

RUN apt-get update && apt-get install -y git zip

COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD ["php-fpm"]
# CMD ["php-fpm", "-D"]
# CMD ["php", "-S", "0.0.0.0:8000", "-t", "/usr/src/php-project/public", "/usr/src/php-project/index.php"]