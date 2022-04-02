#! /usr/bin/bash

backend="backend"
frontend="frontend"
root_directory=${PWD}

cd $frontend && docker-compose up --remove-orphans -d
cd $root_directory
cd $backend
# To solve composer dependency
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

docker-compose up --remove-orphans -d
cd $root_directory



