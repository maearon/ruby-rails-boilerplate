class Jwt::User::DecodeTokenService
  include Service
  include UserJwtClaims

  ACCESS = "access".freeze

  def initialize(auth_header)
    @auth_header = auth_header
  end

  def call
    id_from_claim
  end

  private

  attr_reader :auth_header

  def id_from_claim
    payload = decoded_payload
    payload&.fetch("sub", nil)
  end

  def decoded_payload
    token = bearer_token
    return unless token

    payload, = JWT.decode(
      token,
      jwt_secret,
      true,
      {
        algorithm: ALGORITHM,
        verify_expiration: true
      }
    )
    return unless payload["type"] == ACCESS

    payload
  rescue JWT::DecodeError, JWT::ExpiredSignature, JWT::VerificationError
    nil
  end

  def bearer_token
    return unless auth_header.present?

    scheme, token = auth_header.split(" ", 2)
    return token if token.present? && scheme&.casecmp("Bearer")&.zero?

    # Keep the previous "Authorization: <scheme> <token>" shape working.
    auth_header.split[1]
  end

  def jwt_secret
    Rails.application.secret_key_base
  end
end
