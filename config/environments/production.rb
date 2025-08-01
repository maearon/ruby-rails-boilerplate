require "active_support/core_ext/integer/time"

Rails.application.configure do
  config.cache_classes = true
  config.eager_load = true

  # Không hiển thị lỗi chi tiết trên môi trường production
  config.consider_all_requests_local = false
  config.action_controller.perform_caching = true

  # Không serve file tĩnh (để Render hoặc nginx lo)
  config.public_file_server.enabled = ENV['RAILS_SERVE_STATIC_FILES'].present? || ENV['RENDER'].present?

  # Active Storage (chỉ giữ nếu bạn thực sự upload file)
  config.active_storage.service = :cloudinary

  # Bắt buộc dùng HTTPS
  config.force_ssl = true

  # Logging
  config.log_level = :debug
  config.log_tags = [ :request_id ]
  config.log_formatter = ::Logger::Formatter.new

  if ENV["RAILS_LOG_TO_STDOUT"].present?
    logger           = ActiveSupport::Logger.new(STDOUT)
    logger.formatter = config.log_formatter
    config.logger    = ActiveSupport::TaggedLogging.new(logger)
  end

  # Mailer
  config.action_mailer.perform_caching = false
  config.action_mailer.raise_delivery_errors = true
  config.action_mailer.delivery_method = :smtp
  host = 'ruby-rails-boilerplate-3s9t.onrender.com'
  config.action_mailer.default_url_options = { host: host, protocol: 'https' }
  ActionMailer::Base.smtp_settings = {
    address:              'smtp.gmail.com',
    port:                 587,
    domain:               'onrender.com',
    user_name:            'manhng132@gmail.com',
    password:             ENV['SMTP_PASSWORD'], # nên dùng biến môi trường
    authentication:       :plain,
    enable_starttls_auto: true
  }

  # i18n fallback
  config.i18n.fallbacks = true

  # Deprecation warnings
  config.active_support.deprecation = :notify

  # Không dump schema sau migration
  config.active_record.dump_schema_after_migration = false
end
