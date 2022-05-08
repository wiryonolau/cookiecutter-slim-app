#!/usr/bin/env bash
git init
make composer-install
make composer-update
make yarn-install
make yarn-build
cp docker-compose.nginx-sample.yml docker-compose.yml
cp docker-compose.sample.env docker-compose.env
