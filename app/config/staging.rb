set :domain, "staging.kitchenappliancecentre.co.uk"
set :user, "kacstaging"
set :deploy_to, "/var/www/vhosts/#{domain}/webapps"
ssh_options[:port] = 2020
set :branch, "capifony-deploy-script"

server "root@staging.kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true