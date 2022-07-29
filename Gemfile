source "https://rubygems.org"
git_source(:github) { |repo| "https://github.com/#{repo}.git" }

ruby "3.1.2"

# Bundle edge Rails instead: gem 'rails', github: 'rails/rails', branch: 'main'
gem "rails",                      "7.0.3"
# Use Active Storage variants [https://guides.rubyonrails.org/active_storage_overview.html#transforming-images]
gem "image_processing",           "1.12.2"
# This gems doing it for you. Just use attached: true or content_type: 'image/png' validation.
gem "active_storage_validations", "0.9.8"
# Use Active Model has_secure_password [https://guides.rubyonrails.org/active_model_basics.html#securepassword]
gem "bcrypt",                     "3.1.18"
# Create fake data types
gem "faker",                      "2.21.0"
gem "will_paginate",              "3.3.1"
gem "bootstrap-will_paginate",    "1.0.0"
gem "bootstrap-sass",             "3.4.1"
# Use Sass(not use) OR Scss(using) to process CSS
gem "sassc-rails",                "2.1.2"
# The original asset pipeline for Rails [https://github.com/rails/sprockets-rails]
gem "sprockets-rails",            "3.4.2"
# Use JavaScript with ESM import maps [https://github.com/rails/importmap-rails]
gem "importmap-rails",            "1.1.0"
# Hotwire's SPA-like page accelerator [https://turbo.hotwired.dev]
gem "turbo-rails",                "1.1.1"
# Hotwire's modest JavaScript framework [https://stimulus.hotwired.dev]
gem "stimulus-rails",             "1.0.4"
# Build JSON APIs with ease [https://github.com/rails/jbuilder]
gem "jbuilder",                   "2.11.5"
# Use the Puma web server [https://github.com/puma/puma]
gem "puma",                       "5.6.4"
# Reduces boot times through caching; required in config/boot.rb
gem "bootsnap",                   "1.12.0", require: false

group :development, :test do
  # Use sqlite3 as the database for Active Record
  gem "sqlite3", "1.4.2"
  # See https://guides.rubyonrails.org/debugging_rails_applications.html#debugging-with-the-debug-gem
  gem "debug",   "1.5.0", platforms: %i[ mri mingw x64_mingw ]
end

group :development do
  gem "web-console", "4.2.0"
end

group :test do
  gem "capybara",                 "3.37.1"
  gem "selenium-webdriver",       "4.2.0"
  gem "webdrivers",               "5.0.0"
  gem "rails-controller-testing", "1.0.5"
  gem "minitest",                 "5.15.0"
  gem "minitest-reporters",       "1.5.0"
  gem "guard",                    "2.18.0"
  gem "guard-minitest",           "2.4.6"
end

group :production do
  gem "pg",         "1.3.5"
  gem "aws-sdk-s3", "1.114.0", require: false
end

# Windows does not include zoneinfo files, so bundle the tzinfo-data gem.
# Uncomment the following line if you're running Rails
# on a native Windows system:
# gem "tzinfo-data", platforms: %i[ mingw mswin x64_mingw jruby ]

# Use Redis adapter to run Action Cable in production
# gem 'redis', '~> 4.0'

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
# gem 'mysql2'
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
gem 'slim'
gem 'rails-i18n'
gem 'jquery-rails'

# kill -9 $(lsof -i tcp:3000 -t)
# gem 'simple_form', '~> 5.0', '>= 5.0.1'
# gem 'country_select', '~> 4.0'
# gem 'countries', '~> 3.0'
# gem 'tzinfo', '~> 2.0'
# gem 'money', '~> 6.13', '>= 6.13.6'

gem 'rack-cors'
gem 'jwt'
# gem 'dotenv'
# gem 'redis'
# gem 'graphql'
# gem "graphiql-rails", group: :development
# gem 'search_object_graphql'
