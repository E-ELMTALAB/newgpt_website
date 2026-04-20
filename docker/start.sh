#!/usr/bin/env sh
set -e

if [ ! -f /var/www/html/.env ]; then
  if [ -f /var/www/html/.env.example ]; then
    cp /var/www/html/.env.example /var/www/html/.env
  else
    cat <<'EOF' >/var/www/html/.env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost
LOG_CHANNEL=stderr
LOG_LEVEL=warning
CACHE_STORE=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
EOF
  fi
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
