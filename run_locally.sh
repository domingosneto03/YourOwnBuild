#!/bin/bash

# Stop execution if a step fails
set -e

IMAGE_NAME=git.fe.up.pt:5050/lbaw/lbaw2324/lbaw23104 # Replace with your group's image name

# Ensure that dependencies are available
COMPOSER_ALLOW_SUPERUSER=1 composer install
php artisan config:clear
php artisan clear-compiled
php artisan optimize

# docker buildx build --push --platform linux/amd64 -t $IMAGE_NAME .
docker build -t $IMAGE_NAME .

docker rm lbaw23104 || true

docker run -it -p 8000:80 --name=lbaw23104 -e DB_DATABASE="lbaw23104" -e DB_SCHEMA="lbaw23104" -e DB_USERNAME="lbaw23104" -e DB_PASSWORD="lmnaKqEy" -e APP_DEBUG=true -e APP_LOG_LEVEL=debug -e APP_URL="http://localhost:8000" -e ASSET_URL="http://localhost:8000" -e FORCE_HTTPS=false git.fe.up.pt:5050/lbaw/lbaw2324/lbaw23104