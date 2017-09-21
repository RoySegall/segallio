#!/usr/bin/env bash

composer install

cd web

../vendor/bin/drush si segallio --db-url=mysql://root:root@localhost/segallio --account-pass=admin --account-name=admin --site-name="Roy Segall" -y
