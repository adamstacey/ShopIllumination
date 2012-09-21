clear

echo "Clearing the cache:"
rm -rf app/cache/*
rm -rf app/logs/*
echo "Clearing the dev environment:"
php app/console --env=dev cache:clear
echo "OK!"
echo "Clearing the production environment:"
php app/console --env=prod cache:clear
echo "OK!"
