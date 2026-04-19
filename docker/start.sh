#!/usr/bin/env sh
set -e

if [ ! -f /var/www/html/.env ]; then
  cp /var/www/html/.env.example /var/www/html/.env
fi

cd /var/www/html

if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force
fi

php artisan filament:upgrade --no-interaction || true

php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan migrate --force || true

exec apache2-foreground
