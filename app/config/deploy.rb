# Enable multistage extension
set :stages, ["staging", "production"]
set :default_stage, "staging"
set :stage_dir,     "app/config"
require 'capistrano/ext/multistage'

# Main deployment configuration
#set :deploy_via, :remote_cache
set :keep_releases,  3
ssh_options[:forward_agent] = true
#default_run_options[:pty] = true

# Permissions
set :writable_dirs,     ["app/cache", "app/logs"]
set :webserver_user,    "apache"
set :permission_method, :chmod
set :use_set_permissions, true
set :use_sudo , false

# Repository configuration
set :repository,  "git@github.com:adamstacey/KitchenApplianceCentre.git"
set :scm, :git

# Symfony2 configuration
set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]
set :use_composer, true
set :update_vendors, true
set :dump_assetic_assets, true

set :model_manager, "doctrine"

# Hooks
#after "deploy", "deploy:cleanup"

logger.level = Logger::MAX_LEVEL
