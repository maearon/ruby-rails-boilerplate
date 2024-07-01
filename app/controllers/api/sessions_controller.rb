class Api::SessionsController < Api::ApiController
  before_action :authenticate!, except: %i[create]

  def index
    # binding.b
    # sudo docker ps
    # sudo docker attach 32b385027bd8
    @current_user = current_user if current_user
    @current_user_token = current_user_token if current_user_token
  end

  def create
    @user = User.find_by(email: session_params[:email])
    if @user&.auth?(session_params[:password])
      if @user.activated?
        @user.generate_tokens!
      else
        response401_with_error(error_message(:not_activated))
      end
    else
      response401_with_error(error_message(:invalid_email_or_password))
    end
  end

  def destroy
    current_user.revoke_refresh_token!
    response200
  end

  def refresh
    @user = User.find_by(refresh_token: refresh_params[:refresh_token])
    if @user.present? && (@user.refresh_token_expiration_at&.> Time.current)
      @user.generate_tokens!
    else
      response401_with_error(error_message(:invalid_refresh_token))
    end
  end

  def revoke
    @user = User.find_by(refresh_token: refresh_params[:refresh_token])
    @user.revoke_refresh_token! if @user.present? && (@user.refresh_token_expiration_at&.> Time.current)
    response200
  end

  private

  def session_params
    params.require(:session).permit(:email, :password, :remember_me)
  end

  def refresh_params
    params.require(:auth).permit(:refresh_token)
  end
end
