require "active_support/core_ext/integer/time"

Rails.application.configure do
  config.cache_classes = false
  config.eager_load = false
  config.consider_all_requests_local = true
  config.server_timing = true

  # Caching
  if Rails.root.join("tmp/caching-dev.txt").exist?
    config.action_controller.perform_caching = true
    config.action_controller.enable_fragment_cache_logging = true
    config.cache_store = :memory_store
  else
    config.cache_store = :null_store
  end

  # Active Storage (nếu bạn dùng upload file, giữ lại dòng sau)
  config.active_storage.service = :cloudinary

  # Email setup (chỉ giữ lại nếu bạn gửi email từ API)
  config.action_mailer.delivery_method = :smtp
  config.action_mailer.smtp_settings = {
    address: 'smtp.gmail.com',
    port: 587,
    domain: 'example.com',
    user_name: 'manhng132@gmail.com',
    password:  'rqisoolrehrwayum', # nên dùng ENV['SMTP_PASSWORD'] thay vì hard-code
    authentication: 'plain',
    enable_starttls_auto: true
  }
  # git checkout 1242dc57c527178d6bffd6980c884ba4478bafd4 -- config/environments/development.rb
  # https://myaccount.google.com/lesssecureapps
  # https://accounts.google.com/DisplayUnlockCaptcha
  # https://support.google.com/mail/answer/185833?hl=en
  config.action_mailer.perform_caching = false
  config.action_mailer.raise_delivery_errors = false
  config.action_mailer.default_url_options = { host: 'localhost', port: 3001 }
  Rails.application.routes.default_url_options[:host] = 'http://localhost:3001'

  # Deprecation warnings
  config.active_support.deprecation = :log
  config.active_support.disallowed_deprecation = :raise
  config.active_support.disallowed_deprecation_warnings = []

  config.active_record.migration_error = :page_load
  config.active_record.verbose_query_logs = true

  # Allow any hosts (localhost, etc.)
  config.hosts.clear
end
