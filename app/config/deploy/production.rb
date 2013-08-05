set :domain, "kitchenappliancecentre.co.uk"
set :user, "root"
set :deploy_to, "/home/sites/#{domain}"
ssh_options[:port] = 2020

server "server.kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true