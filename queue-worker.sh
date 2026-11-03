#!/bin/bash
# Laravel queue worker startup script
# Run as: nohup /var/www/html/laravel/queue-worker.sh &

cd /var/www/html/laravel
while true; do
    php artisan queue:work --tries=2 --timeout=300 --sleep=2 --max-jobs=500 --max-time=3600
    echo "[$(date)] Queue worker stopped, restarting in 5s..."
    sleep 5
done
