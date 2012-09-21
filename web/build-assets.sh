clear

echo "Refreshing the assests:"
php app/console assets:install --symlink web
php app/console assetic:dump
echo "OK!"
