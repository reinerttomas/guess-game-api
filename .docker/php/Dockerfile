FROM php:8-fpm-alpine3.14

# Install dependencies
RUN set -eux \
    && apk update \
    && apk add --no-cache \
        bash \
        unzip

# https://github.com/mlocati/docker-php-extension-installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions @composer \
    gd \
    pdo_mysql \
    intl

WORKDIR /var/www/html/

CMD ["php-fpm"]

EXPOSE 9000