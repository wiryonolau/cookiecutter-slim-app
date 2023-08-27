ARG PHP_VERSION=8.1
FROM php:$PHP_VERSION-fpm-ext

RUN php --version

ENV COMPOSER_HOME /composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV PATH /composer/vendor/bin:$PATH
ENV PHP_CONF_DIR=/usr/local/etc/php/conf.d

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN echo "memory_limit=-1" > $PHP_CONF_DIR/99_memory-limit.ini

# Compile dependency
RUN apt-get update \
    && apt-get install -y git \
    && rm -rf /var/lib/apt/list/* /tmp/* /var/tmp/*

ARG PHPSTAN_VERSION=1-php8.1

RUN composer global require phpstan/phpstan:"$PHPSTAN_VERSION" --prefer-dist \
	&& composer clear-cache

VOLUME ["/app"]
WORKDIR /app

ENV PHPSTAN_PRO_WEB_PORT=11111
EXPOSE 11111

ENTRYPOINT ["phpstan"]
