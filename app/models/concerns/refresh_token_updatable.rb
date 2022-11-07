module RefreshTokenUpdatable
  extend ActiveSupport::Concern

  def update_refresh_token!(refresh_token, refresh_token_expiration_at)
    # == update!(refresh_token: refresh_token, refresh_token_expiration_at: refresh_token_expiration_at)
    update!(refresh_token:, refresh_token_expiration_at:)
  end

  def revoke_refresh_token!
    update!(refresh_token: nil, refresh_token_expiration_at: nil)
  end
end
