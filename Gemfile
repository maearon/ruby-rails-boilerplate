source "https://rubygems.org"

ruby "3.4.0.dev"

# Bundle edge Rails instead: gem "rails", github: "rails/rails", branch: "main"
gem "rails", "~> 8.0.1"
# Use postgresql as the database for Active Record
gem "pg", "~> 1.1"
# Use the Puma web server [https://github.com/puma/puma]
gem "puma", ">= 5.0"
# Build JSON APIs with ease [https://github.com/rails/jbuilder]
gem "jbuilder"

# Use Active Model has_secure_password [https://guides.rubyonrails.org/active_model_basics.html#securepassword]
# gem "bcrypt", "~> 3.1.7"

# Windows does not include zoneinfo files, so bundle the tzinfo-data gem
gem "tzinfo-data", platforms: %i[ windows jruby ]

# Use the database-backed adapters for Rails.cache, Active Job, and Action Cable
gem "solid_cache"
gem "solid_queue"
gem "solid_cable"

# Reduces boot times through caching; required in config/boot.rb
gem "bootsnap", require: false

# Deploy this application anywhere as a Docker container [https://kamal-deploy.org]
gem "kamal", require: false

# Add HTTP asset caching/compression and X-Sendfile acceleration to Puma [https://github.com/basecamp/thruster/]
gem "thruster", require: false

# Use Active Storage variants [https://guides.rubyonrails.org/active_storage_overview.html#transforming-images]
# gem "image_processing", "~> 1.2"

# Use Rack CORS for handling Cross-Origin Resource Sharing (CORS), making cross-origin Ajax possible
gem "rack-cors"

# Use Active Storage variants [https://guides.rubyonrails.org/active_storage_overview.html#transforming-images]
gem "image_processing"
# Binding for the libvips, fast, handle large images without loading entire image into memory.
gem 'ruby-vips'
# This gems doing it for you. Just use attached: true or content_type: 'image/png' validation.
gem "active_storage_validations"
# Use Active Model has_secure_password [https://guides.rubyonrails.org/active_model_basics.html#securepassword]
gem "bcrypt"
# Create fake data types
gem "faker"
# gem "will_paginate"
# gem "bootstrap-will_paginate"
gem "bootstrap-sass"
# Use Sass(not use) OR Scss(using) to process CSS
gem "sassc-rails"
# The original asset pipeline for Rails [https://github.com/rails/sprockets-rails]
gem "sprockets-rails"
# Use JavaScript with ESM import maps [https://github.com/rails/importmap-rails]
gem "importmap-rails"
# Hotwire's SPA-like page accelerator [https://turbo.hotwired.dev]
gem "turbo-rails"
# Hotwire's modest JavaScript framework [https://stimulus.hotwired.dev]
gem "stimulus-rails"
# Use Redis adapter to run Action Cable in production
gem "redis", ">= 4.0.1"

group :development, :test do
  # See https://guides.rubyonrails.org/debugging_rails_applications.html#debugging-with-the-debug-gem
  # gem "debug", platforms: %i[ mri windows ], require: "debug/prelude"
  gem "debug", platforms: %i[ mri windows ]

  # Static analysis for security vulnerabilities [https://brakemanscanner.org/]
  gem "brakeman", require: false

  # Omakase Ruby styling [https://github.com/rails/rubocop-rails-omakase/]
  gem "rubocop-rails-omakase", require: false

  # .env
  gem 'dotenv-rails', '~> 2.7'
  gem 'dotenv', '~> 2.8.0'

  # Use console on exceptions pages [https://github.com/rails/web-console]
  gem "web-console"
end

group :test do
  # Use system testing [https://guides.rubyonrails.org/testing.html#system-testing]
  gem "capybara"
  gem "selenium-webdriver"
end

group :production do
  # gem "pg"
  gem "aws-sdk-s3", require: false
end

# Use Kredis to get higher-level data types in Redis [https://github.com/rails/kredis]
# gem 'kredis'

# gem 'image_processing'
# gem 'active_storage_validations'
# gem 'bcrypt'
# gem 'faker'
# gem 'will_paginate'
# gem 'bootstrap-will_paginate'
# gem 'bootstrap-sass'
# gem 'sassc-rails'
# gem 'mini_magick'
gem 'kaminari'
gem 'kaminari-bootstrap'
gem 'ransack'
gem 'react-rails'
# nested forms need jquery
gem 'cocoon'
# gem 'uglifier'
# gem 'coffee-rails'
# This gem allows resetting the id of an AR table to 0. It is useful after a delete_all command
gem 'activerecord_reset_pk_sequence'
gem 'font-awesome-sass'
# gem 'slim'
# gem 'rails-i18n'
gem 'jquery-rails'

# kill -9 $(lsof -i tcp:3000 -t)
# gem 'simple_form', '~> 5.0', '>= 5.0.1'
# gem 'country_select', '~> 4.0'
# gem 'countries', '~> 3.0'
# gem 'tzinfo', '~> 2.0'
# gem 'money', '~> 6.13', '>= 6.13.6'

gem 'jwt'
gem 'graphql'
gem 'rake', '13.2.1'
# gem 'dotenv'
# gem 'graphql'
# gem "graphiql-rails", group: :development
# gem 'search_object_graphql'
gem 'rubyzip', '~> 2.3.0'
