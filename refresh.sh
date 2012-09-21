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
echo "Resetting the permissions:"
chmod -R 777 app/cache/
chmod -R 777 app/logs/
chmod -R 777 web/uploads/
chmod -R 777 web/css/
chmod -R 777 web/js/
chmod -R 777 web/bundles/
chmod -R 777 vendor/
chmod -R 777 src/WebIllumination/ShopBundle/Resources/
chmod -R 777 src/WebIllumination/AdminBundle/Resources/
chown -R kac *
echo "OK!"
