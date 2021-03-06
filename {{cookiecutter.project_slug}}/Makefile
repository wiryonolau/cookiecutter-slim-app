# HELP
# This will output the help for each task
.PHONY: help

help: ## This help.
    @awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

THIS_FILE := $(lastword $(MAKEFILE_LIST))
PHP_VERSION ?= "7.3"

%:
	@echo ""
all:
	@echo ""
build:
	@if [ "$$(docker images -q php:$(PHP_VERSION)-apache-ext 2>/dev/null)" = "" ]; then \
		cd $$(pwd)/docker/php-apache-ext && docker build --build-arg PHP_VERSION=$(PHP_VERSION) -t php:$(PHP_VERSION)-apache-ext .; \
	fi
start:
	$(MAKE) stop
	mkdir -p $$(pwd)/etc/apache2/sites-enabled
	touch $$(pwd)/etc/apache2/sites-enabled/$$(basename "`pwd`").conf
	mkdir -p $$(pwd)/init_db
	$(MAKE) build
	docker network create $$(basename "`pwd`")
	docker run --rm -it -d \
		-p "127.0.0.1:3306:3306" \
        -e MYSQL_ROOT_PASSWORD=888888 \
        -e MYSQL_USER=$$(basename "`pwd`") \
        -e MYSQL_PASSWORD=888888 \
        -e MYSQL_DATABASE=$$(basename "`pwd`") \
        -v $$(pwd)/init_db:/docker-entrypoint-initdb.d \
        --name $$(basename "`pwd`")_mysql \
        --network $$(basename "`pwd`") \
    mysql:5.7
	docker run --rm -it -d \
        -p 127.0.0.1:8080:80 \
        -e APACHE_RUN_GROUP="#$$(id -g)" \
		-e MYSQL_USER=$$(basename "`pwd`") \
		-e MYSQL_PASSWORD=888888 \
		-e MYSQL_DATABASE=$$(basename "`pwd`") \
		-e MYSQL_HOSTNAME=$$(basename "`pwd`")_mysql \
        -v $$(pwd)/$$(basename "`pwd`"):/var/www/html \
        -v $$(pwd)/etc/apache2/sites-enabled:/etc/apache2/sites-enabled \
        --name $$(basename "`pwd`")_httpd \
        --network $$(basename "`pwd`") \
	php:$(PHP_VERSION)-apache-ext
stop:
	docker stop $$(basename "`pwd`")_httpd || true
	docker stop $$(basename "`pwd`")_mysql || true
	docker network rm $$(basename "`pwd`") || true
composer-install:
	docker run --rm -it \
        -v $$(pwd)/$$(basename "`pwd`"):/srv/$$(basename "`pwd`") \
        -w /srv/$$(basename "`pwd`") \
        -e COMPOSER_HOME="/srv/$$(basename "`pwd`")/.composer" \
        --user $$(id -u):$$(id -g) \
    composer composer install --no-plugins --no-scripts --prefer-dist -v --ignore-platform-reqs
composer-update:
	docker run --rm -it \
        -v $$(pwd)/$$(basename "`pwd`"):/srv/$$(basename "`pwd`") \
        -w /srv/$$(basename "`pwd`") \
        -e COMPOSER_HOME="/srv/$$(basename "`pwd`")/.composer" \
        --user $$(id -u):$$(id -g) \
    composer composer update -v --ignore-platform-reqs
composer:
	docker run --rm -it \
        -v $$(pwd)/$$(basename "`pwd`"):/srv/$$(basename "`pwd`") \
        -w /srv/$$(basename "`pwd`") \
        -e COMPOSER_HOME="/srv/$$(basename "`pwd`")/.composer" \
        --user $$(id -u):$$(id -g) \
    composer composer $(filter-out $@,$(MAKECMDGOALS))
yarn:
	docker run --rm -it \
        -v $$(pwd)/$$(basename "`pwd`"):/srv/$$(basename "`pwd`") \
        -w /srv/$$(basename "`pwd`") \
        --user $$(id -u):$$(id -g) \
    node:lts-slim yarn $(filter-out $@,$(MAKECMDGOALS))
