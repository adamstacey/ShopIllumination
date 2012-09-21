clear
echo "Clearing the cache:"
sudo rm -rf app/cache/*
sudo rm -rf app/logs/*
echo "Clearing the dev environment:"
php app/console --env=dev --no-warmup cache:clear
echo "OK!"
echo "Clearing the production environment:"
php app/console --env=prod --no-warmup cache:clear
echo "OK!"
echo "Clearing the APC cache:"
curl http://www.kitchenappliancecentre.co.uk/clear-apc-cache.php
echo " "