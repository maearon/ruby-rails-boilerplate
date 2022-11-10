class Jwt::User::EncodeTokenService
  include Service
  include UserJwtClaims

  # const tokenTypes = {
  #   ACCESS: 'access',
  #   REFRESH: 'refresh',
  #   RESET_PASSWORD: 'resetPassword',
  #   VERIFY_EMAIL: 'verifyEmail',
  # };


  def initialize(user_id)
    @user_claims = {
      sub: user_id
    }
  end

  def call
    [
      encode_token('access'), # access_token
      access_token_expiration.from_now.strftime('%Y-%m-%dT%H:%M:%S.%LZ'), # access_token_expiration_at
      encode_token('refresh'), # refresh_token
      REFRESH_TOKEN_EXPIRATION.from_now # refresh_token_expiration_at
    ]
  end

  private

  attr_reader :user_claims

  def encode_token(type)
    payload = jwt_claims.merge(user_claims, {type: type})
    JWT.encode(payload, Rails.application.credentials[:secret_key_base], ALGORITHM, { typ: 'JWT' }) # ALGORITHM = HS256
  end

  def jwt_claims
    {
      exp: access_token_expiration.from_now.to_i, # Expiration Time
      iat: Time.current.to_i # Issued At
    }
  end

  def access_token_expiration
    Rails.env.development? ? ACCESS_TOKEN_EXPIRATION_FOR_DEV : ACCESS_TOKEN_EXPIRATION
  end
end
