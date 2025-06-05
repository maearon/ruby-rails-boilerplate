class Api::AccountActivationsController < Api::ApiController
  before_action :authenticate!, except: %i[create update]
  before_action :set_user, only: %i[update]
  before_action :valid_user,       only: %i[update]

  def create
    @user = User.find_by(email: params[:resend_activation_email][:email])

    if @user.nil?
      render json: { error: 'User not found' }, status: :not_found
      return
    end

    if @user.activated?
      render json: { message: 'Account already activated' }, status: :unprocessable_entity
    else
      @user.create_activation_digest
      @user.send_activation_email
      render json: { message: 'The activation email has been sent again' }
    end
  end

  def update
    response401_with_error(error_message(:invalid_activation_link)) unless @user && !@user.activated? && @user.authenticated?(:activation, params[:id])
    target_user = User.first
    @user.follow(target_user) if target_user && @user != target_user
    @user.generate_tokens! if @user.activate
    response200
  end

  private

  def user_params
    params.require(:user).permit(:password, :password_confirmation)
  end

  def set_user
    @user = User.find_by(email: params[:email])
  end

  def valid_user
    unless @user && !@user.activated?
           @user.authenticated?(:activation, params[:id])
      response401_with_error(error_message(:invalid_activation_link))
    end
  end
end
