clear

echo "Synchronising the database:"
php app/console doctrine:generate:entities WebIllumination
php app/console doctrine:schema:update --force
echo "OK!"
