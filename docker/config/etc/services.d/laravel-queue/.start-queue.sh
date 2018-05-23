#!/usr/bin/with-contenv bash

cd /home/www/app
php artisan queue:work --sleep=2 --tries=3 --daemon --queue=test-project-queue-${APP_ENV}
