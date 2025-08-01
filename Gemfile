source "https://rubygems.org"

ruby "3.4.2"

# Core Rails and database
gem "rails", "~> 8.0.2"
gem "pg", "~> 1.1"
gem 'kaminari', '~> 1.2', '>= 1.2.2'
gem 'cloudinary', '~> 2.3', '>= 2.3.1'
gem 'activestorage-cloudinary-service', '~> 0.2.3'
gem "puma", ">= 5.0" # Web server
gem "jbuilder"       # JSON responses

# Environment variables
gem "dotenv-rails"

# Background jobs, caching, WebSocket
gem "solid_cache"
gem "solid_queue"
gem "solid_cable"

# Auth, API communication
gem "bcrypt"
gem "jwt"
gem "faraday", "~> 2.13", ">= 2.13.2"

# File uploads & image processing
gem "image_processing"
gem "ruby-vips"
gem "active_storage_validations"

# OpenAI integration
gem "ruby-openai", "~> 5.0"

# GraphQL (optional, if you're using GraphQL)
gem "graphql"

# RabbitMQ client
gem "bunny", "~> 2.24"

# CORS for API
gem "rack-cors"

# For zipping exports or backups
gem "rubyzip", "~> 2.3.0"

# Utility
gem "rake", "13.2.1"

group :development, :test do
  gem "debug", platforms: %i[mri windows]
  gem "brakeman", require: false
  gem "rubocop-rails-omakase", require: false
end

group :test do
  gem "capybara"
  gem "selenium-webdriver"
end

group :production do
  gem "aws-sdk-s3", require: false
end
