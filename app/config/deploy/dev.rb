set :domain, "webide.co"
set :user, "root"
set :deploy_to, "/var/www/vhosts/#{domain}"

server "176.58.99.180", :app, :web, :db, :primary => true

namespace :deploy do
  desc "Set permissions"
  task :chown_directories do
    capifony_pretty_print "--> Setting permissions"
    ["app/cache", "app/logs"].each do |link|
      if shared_children && shared_children.include?(link)
        absolute_link = shared_path + "/" + link
      else
        absolute_link = latest_release + "/" + link
      end

      try_sudo "chown www-data:www-data -R #{absolute_link}"
    end
    capifony_puts_ok
  end
end

task :include_app_dev do
    capifony_pretty_print "--> Including app_dev.php"

    origin_file = "web/app_dev.php"
    destination_file = latest_release + "/web/app_dev.php"

    try_sudo "mkdir -p #{File.dirname(destination_file)}"
    top.upload(origin_file, destination_file)

    capifony_puts_ok
end

after "deploy:update_code", "include_app_dev"
