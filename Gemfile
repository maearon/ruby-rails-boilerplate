source "https://rubygems.org"
git_source(:github) { |repo| "https://github.com/#{repo}.git" }

ruby "3.1.2"

# Bundle edge Rails instead: gem 'rails', github: 'rails/rails', branch: 'main'
gem "rails",                      "7.0.4"
# Use Active Storage variants [https://guides.rubyonrails.org/active_storage_overview.html#transforming-images]
gem "image_processing"
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
# Build JSON APIs with ease [https://github.com/rails/jbuilder]
gem "jbuilder"

gem "hotwire-rails"
# Use the Puma web server [https://github.com/puma/puma]
gem "puma"
# Reduces boot times through caching; required in config/boot.rb
gem "bootsnap", require: false

group :development, :test do
  # Use pg as the database for Active Record
  # gem "pg"
  # See https://guides.rubyonrails.org/debugging_rails_applications.html#debugging-with-the-debug-gem
  gem "debug", platforms: %i[ mri mingw x64_mingw ]
end

group :development do
  gem "web-console", "4.2.0"
  # gem 'letter_opener'
  # gem 'letter_opener_web'
end

group :test do
  gem "capybara"
  gem "selenium-webdriver"
  gem "webdrivers"
  gem "rails-controller-testing"
  gem "minitest"
  gem "minitest-reporters"
  gem "guard"
  gem "guard-minitest"
end

group :production do
  # gem "pg"
  gem "aws-sdk-s3", require: false
end

# Windows does not include zoneinfo files, so bundle the tzinfo-data gem.
# Uncomment the following line if you're running Rails
# on a native Windows system:
# gem "tzinfo-data", platforms: %i[ mingw mswin x64_mingw jruby ]

# Use Redis adapter to run Action Cable in production
gem "redis"

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
gem "pg", "~> 1.1"
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
# gem 'graphql'
# gem "graphiql-rails", group: :development
# gem 'search_object_graphql'
