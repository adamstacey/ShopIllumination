server "kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true

set :domain, "kitchenappliancecentre.co.uk"
set :user, "kac"
set :deploy_to, "/var/www/vhosts/#{domain}"
ssh_options[:port] = 2020
