class ConfirmationsController < ApplicationController

  def new
  end

  def create
    @user = User.find_by(email: params[:confirmation][:email].downcase)
    if @user
      unless @user.activated?
        # @user.create_reset_digest
        # @user.create_confirmation_digest
        # @user.send_password_reset_email
        activation_token = User.new_token
        @user.activation_token = activation_token
        @user.update_attributes(activation_digest: User.digest(activation_token))
        @user.send_activation_email
        flash[:info] = "Confirmation email has been sent again, Please check your email to activate your account."
        redirect_to root_url
      else
        flash[:info] = "Email was already confirmed, please try signing in"
        redirect_to root_url
      end
    else
      flash.now[:danger] = "Email address not found"
      render 'new'
    end
  end

end
