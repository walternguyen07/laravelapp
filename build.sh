#!/bin/bash
# My first script
sudo find . -type d -exec chmod 775 {} \;
sudo find . -type f -exec chmod 664 {} \;
sudo chmod -R ug+rwx  bootstrap/cache
sudo chmod -R ug+rwx storage
sudo chown -Rf johnnguyencodedao:johnnguyencodedao *
php artisan config:cache
chmod 777 -Rf storage
chmod 777 -Rf storage/*