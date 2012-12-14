# Enable multistage extension
set :stages, ["staging", "production"]
set :default_stage, "staging"
set :stage_dir,     "app/config"
require 'capistrano/ext/multistage'

# Main deployment configuration
set :keep_releases,  5
ssh_options[:forward_agent] = true
default_run_options[:pty] = true

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
after "deploy:update_code", "deploy:chown_directories"
after "deploy", "deploy:flush_apc"
after "deploy", "deploy:cleanup"

namespace :deploy do
  desc "Set permissions"
  task :chown_directories do
    capifony_pretty_print "--> Setting permissions"
    ["app/cache", "app/logs"].each do |link|
      if shared_children && shared_children.include?(link)
        absolute_link = shared_path + "/" + link
      else
        absolute_link = latest_release + "/" + link
      end

      try_sudo "chown apache:apache #{absolute_link}"
    end
    capifony_puts_ok
  end
  desc "Clear APC bytecode cache"
  task :flush_apc do
    capifony_pretty_print "--> APC bytecode cache flush"
    run "#{try_sudo} php -r 'apc_clear_cache() ? exit( 0 ) : exit( -1 );'"
    capifony_puts_ok
  end
end

logger.level = Logger::MAX_LEVEL