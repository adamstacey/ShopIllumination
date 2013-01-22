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
echo "Resetting the permissions:"
sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
echo "OK!"
