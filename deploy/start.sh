#!/bin/sh
set -eu
: "${APP_KEY:?Set APP_KEY to the output of php artisan key:generate --show}"
: "${APP_URL:?Set APP_URL to the public HTTPS URL}"
# Render forwards HTTPS to Apache over HTTP. Asset URLs use HTTPS in production.
export PORT="${PORT:-10000}"
case "$PORT" in *[!0-9]*|'') echo 'PORT must be numeric' >&2; exit 1;; esac
sed -i "s/^Listen 80$/Listen $PORT/" /etc/apache2/ports.conf
sed -i "s/VirtualHost \*:10000/VirtualHost *:$PORT/" /etc/apache2/sites-available/000-default.conf
php artisan config:cache
php artisan route:cache
php artisan view:cache
exec apache2-foreground
