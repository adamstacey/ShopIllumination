set :domain, "webide.co"
set :user, "root"
set :deploy_to, "/var/www/vhosts/#{domain}"

server "176.58.99.180", :app, :web, :db, :primary => true
