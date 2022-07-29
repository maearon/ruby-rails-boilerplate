require_relative "boot"

require "rails/all"
# Pick the frameworks you want:
# require "active_model/railtie"
# require "active_job/railtie"
# require "active_record/railtie"
# require "active_storage/engine"
# require "action_controller/railtie"
# require "action_mailer/railtie"
# require "action_mailbox/engine"
# require "action_text/engine"
# require "action_view/railtie"
# require "action_cable/engine"
# require "sprockets/railtie"
# require "rails/test_unit/railtie"

# Require the gems listed in Gemfile, including any gems
# you've limited to :test, :development, or :production.
Bundler.require(*Rails.groups)

module SampleApp
  class Application < Rails::Application
    # Initialize configuration defaults for originally generated Rails version.
    config.load_defaults 7.0

    # Configuration for the application, engines, and railties goes here.
    #
    # These settings can be overridden in specific environments using the files
    # in config/environments, which are processed later.

    # Settings in config/environments/* take precedence over those specified here.
    # Application configuration can go into files in config/initializers
    # -- all .rb files in that directory are automatically loaded after loading
    # the framework and any gems in your application.

    # Don't generate system test files.
    # config.generators.system_tests = nil
    # config.generators do |g|
    #   g.system_tests = nil
    #   g.orm :active_record
    #   g.test_framework :test_unit
    # end

    #
    # https://api.rubyonrails.org/classes/ActiveSupport/TimeZone.html
    # config.time_zone = "Central Time (US & Canada)"
    config.time_zone = 'UTC'
    config.active_record.default_timezone = :local
    # config.eager_load_paths << Rails.root.join("extras")
    config.eager_load_paths << Rails.root.join("lib/cookie_products")
  end
end
# Rails.application.config.action_view.form_with_generates_remote_forms = false
# Rails.application.config.active_record.belongs_to_required_by_default = false
