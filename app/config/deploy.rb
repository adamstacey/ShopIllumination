# Enable multistage extension
set :stages, ["dev", "staging", "production"]
set :default_stage, "staging"
set :stage_dir,     "app/config/deploy"
require 'capistrano/ext/multistage'

# Main deployment configuration
set :keep_releases,  5
ssh_options[:forward_agent] = true
set :deploy_via, :remote_cache
default_run_options[:pty] = true

# Permissions
set :writable_dirs,     ["app/cache", "app/logs"]
set :webserver_user,    "apache"
set :web_user, "apache"
set :web_group, "apache"
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
before 'symfony:composer:install', 'composer:copy_vendors'
before 'symfony:composer:update', 'composer:copy_vendors'
after "deploy:update_code", "deploy:chown_directories"
after "deploy:update_code", "deploy:flush_apc"
after "deploy", "deploy:cleanup"

namespace :composer do
  task :copy_vendors, :except => { :no_release => true } do
    capifony_pretty_print "--> Copy vendor file from previous release"

    run "vendorDir=#{current_path}/vendor; if [ -d $vendorDir ] || [ -h $vendorDir ]; then cp -a $vendorDir #{latest_release}/vendor; fi;"
    capifony_puts_ok
  end
end
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

      try_sudo "chown #{web_user}:#{web_group} -R #{absolute_link}"
    end
    capifony_puts_ok
  end
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

#logger.level = Logger::MAX_LEVEL
