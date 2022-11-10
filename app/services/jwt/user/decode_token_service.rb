class Jwt::User::DecodeTokenService
  include Service
  include UserJwtClaims

  def initialize(auth_header)
    @auth_header = auth_header
  end

  def call
    id_from_claim
  end

  private

  attr_reader :auth_header

  def id_from_claim
    decoded_token[0].fetch('sub') if decoded_token
  end

  def decoded_token
    return unless auth_header

    token = auth_header.split[1] # == auth_header.split(' ')[1]
    JWT.decode(
      token,
      Rails.application.credentials[:secret_key_base],
      true,
      jwt_claims
    )
  end

  def jwt_claims
    {
      # iss: ISS, verify_iss: true,
      # sub: SUB, verify_sub: true,
      # aud: AUD, verify_aud: true,
      algorithm: ALGORITHM
    }
  end
end
