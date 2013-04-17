clear
echo "Clearing the cache:"
rm -rf app/cache/*
rm -rf app/logs/*
echo "Clearing the dev environment:"
php app/console --env=dev --no-warmup cache:clear
echo "OK!"
echo "Clearing the production environment:"
php app/console --env=prod --no-warmup cache:clear
echo "OK!"
echo "Resetting the permissions:"
chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
echo "OK!"
