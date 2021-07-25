#!/bin/bash
echo "--- starting support-center-api ---"
service php7.3-fpm start
/usr/sbin/nginx -g "daemon off;"
cat
