# HELP
# This will output the help for each task
.PHONY: help

help: ## This help.
    @awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help


THIS_FILE := $(lastword $(MAKEFILE_LIST))
PHP_VERSION ?= "7.4"
COMPOSER_VERSION ?= "2"
PROJECT_NAME := "$$(basename `pwd` | cut -d. -f1 )"

%:
	@echo ""
all:
	@echo ""
build:
	@if [ "$$(docker images -q php:${PHP_VERSION}-fpm-ext 2>/dev/null)" = "" ]; then \
		if [ -f "$$(pwd)/docker-compose.yml" ]; then \
			if [ -f "$$(pwd)/docker-compose.env" ]; then \
				docker-compose -f $$(pwd)/docker-compose.yml --env-file $$(pwd)/docker-compose.env build --build-arg PHP_VERSION=${PHP_VERSION}; \
			else \
				docker-compose -f $$(pwd)/docker-compose.yml build --build-arg PHP_VERSION=${PHP_VERSION}; \
			fi \
		else \
			echo "Please create docker-compose.yml file in project root"; \
		fi \
	fi
start:
	$(MAKE) -s stop
	$(MAKE) -s build
	@if [ -f "$$(pwd)/docker-compose.yml" ]; then \
		if [ -f "$$(pwd)/docker-compose.env" ]; then \
			USERID=$$(id -u) GROUPID=$$(id -g) docker-compose -f $$(pwd)/docker-compose.yml --env-file $$(pwd)/docker-compose.env  up -d; \
		else \
			USERID=$$(id -u) GROUPID=$$(id -g) docker-compose -f $$(pwd)/docker-compose.yml up -d; \
		fi \
	else \
		echo "Please create docker-compose.yml file in project root"; \
	fi
stop:
	@if [ -f "$$(pwd)/docker-compose.yml" ]; then \
		USERID=$$(id -u) GROUPID=$$(id -g) docker-compose -f docker-compose.yml down -v; \
	else \
		echo "Please create docker-compose.yml file in project root"; \
	fi
cli:
	docker run --rm -it \
        -v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
		-w /srv/${PROJECT_NAME} \
		--user "$$(id -u):$$(id -g)" \
        --name ${PROJECT_NAME}_cli \
    php:${PHP_VERSION}-fpm-ext bin/${PROJECT_NAME} $(filter-out $@,$(MAKECMDGOALS))
unittest:
	docker run --rm -it \
        -v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
		-w /srv/${PROJECT_NAME} \
		--user "$$(id -u):$$(id -g)" \
        --name ${PROJECT_NAME}_cli \
    php:${PHP_VERSION}-fpm-ext vendor/bin/phpunit --verbose --debug test
composer-install:
	docker run --rm -it \
        -v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
        -w /srv/${PROJECT_NAME} \
        -e COMPOSER_HOME="/srv/${PROJECT_NAME}/.composer" \
        --user $$(id -u):$$(id -g) \
    composer:${COMPOSER_VERSION} composer install --no-plugins --no-scripts --prefer-dist -v
composer-update:
	docker run --rm -it \
        -v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
        -w /srv/${PROJECT_NAME} \
        -e COMPOSER_HOME="/srv/${PROJECT_NAME}/.composer" \
        --user $$(id -u):$$(id -g) \
    composer:${COMPOSER_VERSION} composer update --no-plugins --no-scripts --prefer-dist -v
composer:
	docker run --rm -it \
        -v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
        -w /srv/${PROJECT_NAME} \
        -e COMPOSER_HOME="/srv/${PROJECT_NAME}/.composer" \
        --user $$(id -u):$$(id -g) \
    composer:${COMPOSER_VERSION} composer $(filter-out $@,$(MAKECMDGOALS))
yarn-install:
	docker run --rm -it \
		-v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
		-w /srv/${PROJECT_NAME} \
		-e NODE_ENV=production \
		--user $$(id -u):$$(id -g) \
	node:lts-slim yarn install
yarn:
	docker run --rm -it \
		-v $$(pwd)/${PROJECT_NAME}:/srv/${PROJECT_NAME} \
		-w /srv/${PROJECT_NAME} \
		-e NODE_ENV=production \
		--user $$(id -u):$$(id -g) \
	node:lts-slim yarn $(filter-out $@,$(MAKECMDGOALS))
