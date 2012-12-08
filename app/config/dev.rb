server "127.0.0.1", :app, :web, :db, :primary => true

set :domain,      "127.0.0.1"
set :user, "vagrant"
set :password, "vagrant"
set :deploy_to,        "/var/www/application"
ssh_options[:port] = 2222
