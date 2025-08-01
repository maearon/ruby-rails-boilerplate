module UserJwtClaims
  extend ActiveSupport::Concern

  ALGORITHM = 'HS512'.freeze
  ISS = 'http://localhost'.freeze
  SUB = 'rails-boilerplate-user'.freeze
  AUD = ['http://localhost'].freeze
  ACCESS_TOKEN_EXPIRATION = 1.hour
  ACCESS_TOKEN_EXPIRATION_FOR_DEV = 24.hours
  REFRESH_TOKEN_EXPIRATION = 1.day
  REFRESH_TOKEN_EXPIRATION_FOR_DEV = 30.days
end
