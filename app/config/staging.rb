server "staging.#{application}.co.uk", :app, :web, :db, :primary => true

set :domain,      "staging.#{application}.co.uk"
set :deploy_to,   "/var/www/#{domain}"
