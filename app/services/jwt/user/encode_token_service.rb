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

  def call # to .call
    [
      encode_token('access'), # access_token
      ACCESS_TOKEN_EXPIRATION.from_now.strftime('%Y-%m-%dT%H:%M:%SZ'), # UNIX to ISO string
      encode_token('refresh'), # refresh_token
      REFRESH_TOKEN_EXPIRATION.from_now.strftime('%Y-%m-%dT%H:%M:%SZ') # UNIX to ISO string add milliseconds .742 add ('%Y-%m-%dT%H:%M:%S.%LZ') if needed
    ]
  end

  private

  attr_reader :user_claims

  def encode_token(type)
    payload = jwt_claims.merge(user_claims, {type: type})
    JWT.encode(payload, Rails.application.credentials[:secret_key_base], ALGORITHM, { typ: 'JWT' }) # ALGORITHM = HS512
  end

  def jwt_claims
    {
      exp: access_token_expiration.from_now.to_i, # // UNIX timestamp
      iat: Time.current.to_i # // UNIX timestamp
    }
  end

  def access_token_expiration
    Rails.env.development? ? ACCESS_TOKEN_EXPIRATION_FOR_DEV : ACCESS_TOKEN_EXPIRATION
  end

  def refresh_token_expiration
    Rails.env.development? ? REFRESH_TOKEN_EXPIRATION_FOR_DEV : REFRESH_TOKEN_EXPIRATION
  end
end
