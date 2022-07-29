class Api::SessionsController < Api::ApiController
  def index
    if current_user
      @user = current_user
      # render json: { user: current_user }
    else
      head :ok
    end
  end
  def create
    @user = User.find_by(email: params[:session][:email].downcase)
    if @user && @user.authenticate(params[:session][:password])
      if @user.activated?
        log_in @user
        params[:session][:remember_me] == '1' ? remember(@user) : forget(@user)
        # redirect_back_or user
        payload = {user_id: @user.id}
        @token = encode_token(payload)
        # render json: {
        #   user: user
        # }
      else
        message  = "Account not activated. "
        message += "Check your email for the activation link."
        # render json: { flash: ["warning", message] }
      end
    else
      # render json: { flash: ["danger", "Invalid email/password combination"] }
    end
  end
  def destroy
    log_out if logged_in?
    head :ok
  end
end
