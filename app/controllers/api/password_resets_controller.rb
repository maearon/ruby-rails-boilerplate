class Api::PasswordResetsController < Api::ApiController
    before_action :get_user,         only: [:edit, :update]
    before_action :valid_user,       only: [:edit, :update]
    before_action :check_expiration, only: [:edit, :update]    # Case (1)
  
    def create
      @user = User.find_by(email: params[:password_reset][:email].downcase)
      if @user
        @user.create_reset_digest
        @user.send_password_reset_email
        # flash[:info] = "Email sent with password reset instructions"
        render json: { flash: ["info", "Email sent with password reset instructions"] }
        # redirect_to root_url
      else
        # flash.now[:danger] = "Email address not found"
        render json: { flash: ["danger", "Email address not found"] }
        # render 'new'
      end
    end
  
    def update
      if params[:user][:password].empty?                  # Case (3)
        @user.errors.add(:password, "can't be empty")
        render json: { error: @user.errors.full_messages }
        # render 'edit'
      elsif @user.update(user_params)                     # Case (4)
        log_in @user
        # flash[:success] = "Password has been reset."
        render json: { user_id: @user.id, flash: ["success", "Password has been reset."] }
        # redirect_to @user
      else
        render json: { error: @user.errors.full_messages }
        # render 'edit'                                     # Case (2)
      end
    end
  
    private
  
      def user_params
        params.require(:user).permit(:password, :password_confirmation)
      end
  
      # Before filters
  
      def get_user
        @user = User.find_by(email: params[:email])
      end
  
      # Confirms a valid user.
      def valid_user
        unless (@user && @user.activated? &&
                @user.authenticated?(:reset, params[:id]))
          redirect_to root_url
        end
      end
  
      # Checks expiration of reset token.
      def check_expiration
        if @user.password_reset_expired?
        #   flash[:danger] = "Password reset has expired."
          render json: { flash: ["danger", "Password reset has expired."] }
        #   redirect_to new_password_reset_url
        end
      end
  end
  