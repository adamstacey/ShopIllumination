set :domain, "staging.kitchenappliancecentre.co.uk"
set :user, "root"
set :deploy_to, "/var/www/vhosts/#{domain}/webapps"
ssh_options[:port] = 2020
set :shared_files, [app_path + "/config/parameters.yml", web_path + "/app_dev.php"]

server "staging.kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true

task :include_app_dev do
    capifony_pretty_print "--> Including app_dev.php"

    origin_file = "web/app_dev.php"
    destination_file = latest_release + "/web/app_dev.php"

    try_sudo "mkdir -p #{File.dirname(destination_file)}"
    top.upload(origin_file, destination_file)

    capifony_puts_ok
end

after "deploy:update_code", "include_app_dev"