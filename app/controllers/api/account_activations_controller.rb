class Api::AccountActivationsController < Api::ApiController

  def update
    @user = User.find_by(email: params[:email])
    if @user && !@user.activated? && @user.authenticated?(:activation, params[:id])
      @user.activate
      # log_in @user
      # remember(@user)
      payload = {user_id: @user.id}
      @token = encode_token(payload)
      # render json: { flash: ["success", "Account activated!"] }
      # redirect_to @user
      # redirect_to "https://sample-app-nextjs.vercel.app/users/#{@user.id}"
    else
      # render json: { flash: ["danger", "Invalid activation link"] }
      # redirect_to "https://sample-app-nextjs.vercel.app"
    end
  end
end
