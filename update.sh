clear

echo "Clearing the cache:"
sudo rm -rf app/cache/*
sudo rm -rf app/logs/*
sudo php app/console cache:clear
echo "OK!"

echo "Refreshing the assests:"
sudo php app/console assets:install --symlink web
sudo php app/console assetic:dump
echo "OK!"

echo "Synchronising the database:"
sudo php app/console doctrine:generate:entities WebIllumination
sudo php app/console doctrine:schema:update --force
echo "OK!"

echo "Resetting the permissions:"
sudo chmod -R 777 app/cache/
sudo chmod -R 777 app/logs/
sudo chmod -R 777 web/uploads/
sudo chmod -R 777 web/css/
sudo chmod -R 777 web/js/
sudo chmod -R 777 web/bundles/
sudo chmod -R 777 src/WebIllumination/ShopBundle/Resources/
sudo chmod -R 777 src/WebIllumination/AdminBundle/Resources/
sudo chown -R adamstacey *
echo "OK!"
