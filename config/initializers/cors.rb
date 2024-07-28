# Be sure to restart your server when you modify this file.

# Avoid CORS issues when API is called from the frontend app.
# Handle Cross-Origin Resource Sharing (CORS) in order to accept cross-origin AJAX requests.

# Read more: https://github.com/cyu/rack-cors

Rails.application.config.middleware.insert_before 0, Rack::Cors do
  allow do
    origins 'http://localhost:19006'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://localhost:3000'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://localhost:3001'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://localhost:4200'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end
  
  allow do
    origins 'http://localhost:8000'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://localhost:8080'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://ruby-rails-boilerplate-chv2p231v-maearons-projects.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://ruby-rails-boilerplate.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end
end
