#!/usr/bin/env bash

composer install

cd web

../vendor/bin/drush si segallio --db-url=mysql://root:root@localhost/segallio --account-pass=admin --account-name=admin --site-name="Roy Segall" -y
../vendor/bin/drush mim --all
../vendor/bin/drupal migrate:jsons facebook
../vendor/bin/drupal migrate:jsons github
../vendor/bin/drupal migrate:jsons twitter
../vendor/bin/drupal migrate:jsons instagram
