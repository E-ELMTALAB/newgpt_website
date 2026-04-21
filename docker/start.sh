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

required_extensions="pdo pdo_pgsql pgsql"
for ext in $required_extensions; do
  if ! php -m | grep -qi "^${ext}$"; then
    echo "Missing required PHP extension: ${ext}" >&2
    exit 1
  fi
done

if grep -q '^APP_ENV=local' .env; then
  sed -i 's|^APP_ENV=local|APP_ENV=production|' .env
fi

if grep -q '^APP_DEBUG=true' .env; then
  sed -i 's|^APP_DEBUG=true|APP_DEBUG=false|' .env
fi

if [ -n "${RENDER_EXTERNAL_URL:-}" ]; then
  if grep -q '^APP_URL=' .env; then
    sed -i "s|^APP_URL=.*|APP_URL=${RENDER_EXTERNAL_URL}|" .env
  else
    echo "APP_URL=${RENDER_EXTERNAL_URL}" >> .env
  fi
fi

if grep -q '^APP_URL=http://' .env; then
  sed -i 's|^APP_URL=http://|APP_URL=https://|' .env
fi

if grep -q '^ASSET_URL=http://' .env; then
  sed -i 's|^ASSET_URL=http://|ASSET_URL=https://|' .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force
fi

php artisan filament:upgrade --no-interaction || true

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec apache2-foreground
