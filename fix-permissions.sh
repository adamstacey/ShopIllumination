clear

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
