class Jwt::User::EncodeTokenService
  include Service
  include UserJwtClaims

  ACCESS = "access".freeze
  REFRESH = "refresh".freeze

  def initialize(user_id)
    @user_claims = {
      sub: user_id.to_s
    }
  end

  def call
    [
      encode_token(ACCESS),
      access_token_expiration.from_now.strftime("%Y-%m-%dT%H:%M:%SZ"),
      encode_token(REFRESH),
      refresh_token_expiration.from_now.strftime("%Y-%m-%dT%H:%M:%SZ")
    ]
  end

  private

  attr_reader :user_claims

  def encode_token(type)
    payload = jwt_claims(type).merge(user_claims, { type: type })
    JWT.encode(payload, jwt_secret, ALGORITHM, { typ: "JWT" })
  end

  def jwt_claims(type)
    {
      exp: expiration_for(type).from_now.to_i,
      iat: Time.current.to_i
    }
  end

  def expiration_for(type)
    type == REFRESH ? refresh_token_expiration : access_token_expiration
  end

  def access_token_expiration
    Rails.env.development? ? ACCESS_TOKEN_EXPIRATION_FOR_DEV : ACCESS_TOKEN_EXPIRATION
  end

  def refresh_token_expiration
    Rails.env.development? ? REFRESH_TOKEN_EXPIRATION_FOR_DEV : REFRESH_TOKEN_EXPIRATION
  end

  def jwt_secret
    Rails.application.secret_key_base
  end
end
