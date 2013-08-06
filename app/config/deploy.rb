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
set :writable_dirs,     [app_path + "/cache", app_path + "/logs", web_path + "/uploads", web_path + "/media"]
set :permission_method,   :acl
set :use_set_permissions, true
set :use_sudo , false

# Repository configuration
set :repository,  "git@github.com:adamstacey/KitchenApplianceCentre.git"
set :scm, :git

# Symfony2 configuration
set :shared_files, ["app/config/parameters.yml", "web/sitemap.xml", "web/google-products.xml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", web_path + "/media"]
set :use_composer, true
set :copy_vendors, true
set :dump_assetic_assets, true

set :model_manager, "doctrine"

# Hooks
after "deploy:update_code", "deploy:flush_apc"
# after "deploy:update_code", "deploy:solr"
after "deploy", "deploy:cleanup"

namespace :deploy do
    desc "Clear APC bytecode cache"
    task :flush_apc do
        capifony_pretty_print "--> APC bytecode cache flush"
        run "#{try_sudo} php -r 'apc_clear_cache() ? exit( 0 ) : exit( -1 );'"
        capifony_puts_ok
    end
    desc "Update the solr schema and run the reindex command"
    task :solr do
        after "deploy:solr", "solr:update_config"
        after "deploy:solr", "solr:reindex"
    end
    desc "Restart Apache"
    task :restart, :except => { :no_release => true }, :roles => :app do
        run "sudo service apache2 restart"
        puts "--> Apache successfully restarted".green
    end
end
namespace :solr do
    desc "Update the solr schema file"
    task :update_config do
        capifony_pretty_print "--> Updating solr schema.xml"

        origin_file = shared_path + "/cached-copy/src/KAC/SiteBundle/Resources/solr/products/conf/schema.xml"
        destination_file = solr_dir + "/products/conf/schema.xml"

        try_sudo "mkdir -p #{File.dirname(destination_file)}"
        try_sudo "cp -f #{origin_file} #{destination_file}"

        capifony_puts_ok
    end
    desc "Warm up the solr index"
    task :reindex do
        capifony_pretty_print "--> Warming up solr index"
        run "#{try_sudo} sh -c 'cd #{latest_release} && #{php_bin} #{symfony_console} admin:index:warmup --env=#{symfony_env_prod}'"
        capifony_puts_ok
    end
end