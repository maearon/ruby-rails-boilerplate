class Api::UsersController < Api::ApiController
  before_action :authenticate!, except: %i[create]
  before_action :set_user,       except: %i[index create]
  before_action :correct_user,   only: %i[update destroy]
  before_action :admin_user,     only: %i[destroy]

  def index
    users = User.all.order(id: :asc)
    @total, @users = pager(users)
  end

  def create
    @user = User.new(user_params)

    if @user.save
      @user.send_activation_email
    else
      response422_with_error(@user.errors.messages)
    end
  end

  def update
    if @user.update(user_params)
      @user.unactivate if @user.saved_change_to_email? && @user.send_activation_email
      response200
    else
      response422_with_error(@user.errors.messages)
    end
  end

  def destroy
    @user.destroy
    response200
  end

  private

  def set_user
    @user = User.find(params[:id])
  end

  def user_params
    params.require(:user).permit(
      :name, :email, :password, :password_confirmation
    )
  end

  def correct_user
    @user = User.find(params[:id])
    response403_with_error(error_message(:not_current_user)) unless @user == current_user
  end

  def admin_user
    response403_with_error(error_message(:not_admin)) unless current_user.admin?
  end
end
