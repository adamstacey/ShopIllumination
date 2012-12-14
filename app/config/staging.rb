set :domain, "staging.kitchenappliancecentre.co.uk"
set :user, "root"
set :deploy_to, "/var/www/vhosts/#{domain}/webapps"
ssh_options[:port] = 2020
set :branch, "capifony-deploy-script"

server "staging.kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true