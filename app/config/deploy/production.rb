set :domain, "kitchenappliancecentre.co.uk"
set :user, "root"
set :deploy_to, "/home/sites/#{domain}"
ssh_options[:port] = 2020

set :solr_path, "http://kitchenappliancecentre.co.uk:8080/solr"
set :solr_dir, "/var/solr"

server "server.kitchenappliancecentre.co.uk", :app, :web, :db, :primary => true