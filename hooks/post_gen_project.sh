#!/usr/bin/env bash
git init
make composer-install
make composer-update
make yarn install
