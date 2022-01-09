#!/bin/sh
php artisan cache:clear &&
php artisan config:clear &&
php artisan config:cache &&
php artisan view:clear &&
php artisan clear-compiled &&
php artisan optimize &&
php artisan route:clear
