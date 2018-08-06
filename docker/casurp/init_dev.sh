#!/bin/bash

export HOME=/tmp
COMPOSER_CACHE_DIR=/tmp
cd /casurp
composer -n install
yarn --non-interactive install
./node_modules/.bin/encore dev

#bin/console doctrine:schema:update --em db
