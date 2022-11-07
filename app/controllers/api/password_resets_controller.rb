class Api::PasswordResetsController < Api::ApiController
  before_action :authenticate!, except: %i[create update]
  before_action :set_user, only: %i[update]
  before_action :valid_user,       only: %i[update]
  before_action :check_expiration, only: %i[update]    # Case (1)

  def create
    @user = User.find_by(email: params[:password_reset][:email])
    if @user
      @user.create_reset_digest
      @user.send_password_reset_email
      response200
    else
      response401_with_error(error_message(:not_found_email))
    end
  end

  def update
    if params[:user][:password].empty?                  # Case (3)
      @user.errors.add(:password, error_message(:blank))
      response422_with_error(@user.errors.messages)
    elsif @user.update(user_params)                     # Case (4)
      response200
    else                                                # Case (2)
      response422_with_error(@user.errors.messages)
    end
  end

  private

  def user_params
    params.require(:user).permit(:password, :password_confirmation)
  end

  def set_user
    @user = User.find_by(email: params[:email])
  end

  def valid_user
    unless @user&.activated? &&
           @user&.authenticated?(:reset, params[:id])
      response401_with_error(error_message(:not_valid_user))
    end
  end

  def check_expiration
    response401_with_error(error_message(:password_reset_expired)) if @user.password_reset_expired?
  end
end
  