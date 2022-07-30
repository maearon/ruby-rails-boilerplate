class Api::UsersController < Api::ApiController
  before_action :logged_in_user, only: [:index, :edit, :update, :destroy,
                                        :following, :followers]
  before_action :set_user,       except: [:index, :new, :create]
  before_action :correct_user,   only: [:edit, :update,
                                        :following, :followers]
  before_action :admin_user,     only: :destroy

  def index
    @users = User.page(params[:page])
  end

  def show
    @microposts = @user.microposts.page(params[:page])
    @current_user = current_user
  end
  def create
    @user = User.new(user_params)
    if @user.save
      @user.send_activation_email
      render json: {
        flash: ["info", "Please check your email to activate your account."],
        user: @user
        # redirect_to root_url
      }
    else
      render json: { error: @user.errors.full_messages }, status: :unprocessable_entity
      # res = {
      #   error: @user.errors.full_messages,
      #   status: 303
      # }
      # render :json => res, :status => :unprocessable_entity
      # render json: res, status: :unprocessable_entity
    end
  end
  def edit
    render json: {
      user: @user,
      gravatar: Digest::MD5::hexdigest(@user.email.downcase)
    }
  end
  def update
    if @user.update(user_params)
      # format.json { head :no_content }
      render json: { flash_success: ["success", "Profile updated"] }, status: :ok
    else
      render json: { error: @user.errors.full_messages }, status: :unprocessable_entity
    end
  end
  def destroy
    @user.destroy
    render json: { flash: ["success", "User deleted"] }, status: :see_other
  end
  def following
    @user  = User.find(params[:id])
    @users = @user.following.page(params[:page])
    @xusers = @user.following
    # format.json { 
    #   render template: 'api/users/following.json.jbuilder', 
    #   status: unprocessable_entity 
    # }
  end
  def followers
    @user  = User.find(params[:id])
    @users = @user.followers.page(params[:page])
    @xusers = @user.followers
    # format.json { 
    #   render template: 'api/users/followers.json.jbuilder', 
    #   status: unprocessable_entity 
    # }
  end
  private
    def set_user
      params[:id] ||= current_user.id
      @user = User.find(params[:id])
    end
    def user_params
      params.require(:user).permit(:name, :email, :password,
                                   :password_confirmation)
    end
    # Before filters
    # Confirms the correct user.
    def correct_user
      params[:id] ||= current_user.id
      @user = User.find(params[:id])
      render json: { flash: ["info", "User aren't Current User"] } unless current_user?(@user)
    end
    # Confirms an admin user.
    def admin_user
      render json: { flash: ["info", "Current User aren't Admin"] } unless current_user.admin?
    end
end
