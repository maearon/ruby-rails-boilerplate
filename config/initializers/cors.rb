# Be sure to restart your server when you modify this file.

# Avoid CORS issues when API is called from the frontend app.
# Handle Cross-Origin Resource Sharing (CORS) in order to accept cross-origin AJAX requests.

# Read more: https://github.com/cyu/rack-cors

Rails.application.config.middleware.insert_before 0, Rack::Cors do
  allow do
    origins 'https://aa9e-2001-ee0-4422-98f0-73c6-d4af-616c-fc1.ngrok-free.app', 'https://studio.apollographql.com'
  
    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head],
      credentials: true
  end

  allow do
    origins 'http://localhost:19006'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://localhost:9000'

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
    origins 'http://localhost:3002'

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
    origins 'http://localhost:5173'

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

  allow do
    origins 'https://funny-movies-79gl1t9ss-maearons-projects.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://funny-movies-pied.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://sample-1xdla8a74-maearons-projects.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://sample-app-beta-lac.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://vue-boilerplate-psi.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://react-boilerplate-tau.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'https://adidas-mocha.vercel.app'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://192.168.1.7:8081', 'exp://192.168.1.7:8081', 'http://localhost:8081'

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end

  allow do
    origins 'http://192.168.1.7:5555', 'http://localhost:5555' # Flutter Web (VD: chạy trên port khác) # Flutter local web build (nếu bạn test local)

    resource '*',
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head], credentials: true
  end
end
