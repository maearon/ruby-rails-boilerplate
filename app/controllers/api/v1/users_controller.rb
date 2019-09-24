class Api::V1::UsersController < Api::V1::ApiController
  def index
    @users = User.ransack(name_cont: params[:q]).result(distinct: true)
    # if params[:q].present?
  end
end
