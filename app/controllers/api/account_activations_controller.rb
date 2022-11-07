class Api::AccountActivationsController < Api::ApiController
  before_action :authenticate!, except: %i[update]

  def update
    @user = User.find_by(email: params[:email])
    response401_with_error(error_message(:invalid_activation_link)) unless @user && !@user.activated? && @user.authenticated?(:activation, params[:id])

    @user.generate_tokens! if @user.activate
    response200
  end
end
