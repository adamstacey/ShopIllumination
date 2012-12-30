set :domain, "webide.co"
set :user, "root"
set :deploy_to, "/var/www/vhosts/#{domain}"

set :web_user, "www-data"
set :web_group, "www-data"

server "176.58.99.180", :app, :web, :db, :primary => true

task :include_app_dev do
    capifony_pretty_print "--> Including app_dev.php"

    origin_file = "web/app_dev.php"
    destination_file = latest_release + "/web/app_dev.php"

    try_sudo "mkdir -p #{File.dirname(destination_file)}"
    top.upload(origin_file, destination_file)

    capifony_puts_ok
end

after "deploy:update_code", "include_app_dev"
