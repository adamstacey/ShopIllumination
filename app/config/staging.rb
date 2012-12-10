server "staging.kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true

set :domain, "staging.kitchenappliancecentre.co.uk"
set :user, "kacstaging"
set :deploy_to, "/var/www/vhosts/#{domain}"
ssh_options[:port] = 2020
