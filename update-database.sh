clear

echo "Synchronising the database:"
php app/console doctrine:generate:entities KAC
php app/console doctrine:schema:update --dump-sql
php app/console doctrine:schema:update --force
echo "OK!"
