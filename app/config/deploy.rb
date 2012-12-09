# Enable multistage extension
set :stages, ["dev", "staging", "production"]
set :default_stage, "dev"
set :stage_dir,     "app/config"
require 'capistrano/ext/multistage'

# Main deployment configuration
# set :deploy_via, :remote_cache
set :keep_releases,  3
ssh_options[:forward_agent] = true
default_run_options[:pty] = true

# Permissions
set :writable_dirs,     ["app/cache", "app/logs"]
set :webserver_user,    "www-data"
set :permission_method, :acl
set :use_permissions, true
set :use_sudo , true

# Repository configuration
set :repository,  "git@github.com:dancannon/KitchenApplianceCentre.git"
set :scm, :git

# Symfony2 configuration
set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]
set :use_composer, true
set :update_vendors, true
set :dump_assetic_assets, true

set :model_manager, "doctrine"

# Hooks
after "deploy", "deploy:cleanup"

logger.level = Logger::MAX_LEVEL