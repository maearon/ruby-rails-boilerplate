class Api::UsersController < Api::ApiController
  before_action :authenticate!,  except: %i[create]
  before_action :set_user,       except: %i[index create]
  before_action :correct_user,   only: %i[destroy]
  before_action :admin_user,     only: %i[destroy]

  def index
    # @users = User.all.page(params[:page])
    @users = User.all.page(params[:page])
    @total, users = pager(User.all.order(id: :asc))
  end

  def show
    @microposts = @user.microposts.page(params[:page])
    @total, microposts = pager(@user.microposts.order(id: :asc))
    @current_user = current_user if current_user
    # binding.b
  end

  def create
    @user = User.new(user_params)
    @user.id = SecureRandom.uuid  # Gán GUID cho @user.id
    @user.displayName = @user.name
    @user.username = @user.email.split('@').first
    if @user.save
      @user.create_activation_digest
      @user.send_activation_email
    else
      response422_with_error(@user.errors.messages)
    end
  end

  def edit
  end

  def update
    # binding.b
    if user_params[:avatar].present?
      if @user.avatar.attached?
        @user.avatar.purge
      end
      @user.avatar.attach(user_params[:avatar])
    end
    if @user.update(user_params.except(:avatar))
      @user.update(avatarUrl: rails_blob_url(@user.avatar, only_path: false)) if @user.avatar.attached?
      render json: { flash: ["success", "Avatar's User updated!"], avatarUrl: @user.avatarUrl }
    else
      response422_with_error(@user.errors.messages)
    end
  end

  def destroy
    @user.destroy
    response200
  end

  def following
    @title = "Following"
    @user  = User.find(params[:id])
    @users = @user.following.page(params[:page])
    @xusers = @user.following
  end

  def followers
    @title = "Followers"
    @user  = User.find(params[:id])
    @users = @user.followers.page(params[:page])
    @xusers = @user.followers
  end

  private

  def set_user
    @user = User.find(params[:id])
  end

  def user_params
    permitted_params = [:name, :email, :password, :password_confirmation]
    permitted_params << :avatar if action_name == "update"
  
    params.require(:user).permit(*permitted_params)
  end

  def correct_user
    @user = User.find(params[:id])
    response403_with_error(error_message(:not_current_user)) unless @user == current_user
  end

  def admin_user
    response403_with_error(error_message(:not_admin)) unless current_user.admin?
  end
end
