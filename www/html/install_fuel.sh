#! /bin/bash

composer create-project fuel/fuel ./app
chmod 777 /var/www/html/app/fuel/app/logs

rm ./install_fuel.sh