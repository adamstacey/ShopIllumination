# Enable multistage extension
set :stages, ["dev", "staging", "production"]
set :default_stage, "staging"
set :stage_dir,     "app/config/deploy"
require 'capistrano/ext/multistage'

# Main deployment configuration
set :keep_releases,  5
set :deploy_via, :remote_cache
#set :deploy_via, :copy
ssh_options[:forward_agent] = true
default_run_options[:pty] = true

# Permissions
set :writable_dirs,     [app_path + "/cache", app_path + "/logs", web_path + "/uploads"]
set :permission_method,   :acl
set :use_set_permissions, true
set :use_sudo , false

# Repository configuration
set :repository,  "git@github.com:adamstacey/KitchenApplianceCentre.git"
set :scm, :git

# Symfony2 configuration
set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", app_path + "/sessions"]
set :use_composer, true
set :copy_vendors, true
set :dump_assetic_assets, true

set :model_manager, "doctrine"

# Hooks
after "deploy:update_code", "deploy:flush_apc"
after "deploy", "deploy:cleanup"

namespace :deploy do
  desc "Clear APC bytecode cache"
  task :flush_apc do
    capifony_pretty_print "--> APC bytecode cache flush"
    run "#{try_sudo} php -r 'apc_clear_cache() ? exit( 0 ) : exit( -1 );'"
    capifony_puts_ok
  end
  desc "Gracefully restart Apache"
  task :flush_apc do
    capifony_pretty_print "--> Restart apache"
    run "#{try_sudo} apachectl graceful"
    capifony_puts_ok
  end
end
