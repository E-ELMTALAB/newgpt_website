#!/usr/bin/env sh
set -e

cd /var/www/html

php artisan migrate --force --no-interaction

# Seed only when explicitly enabled (recommended for first deploy or manual backfill).
if [ "${RUN_DB_SEED_ON_DEPLOY:-false}" = "true" ]; then
  php artisan db:seed --force --no-interaction
fi

