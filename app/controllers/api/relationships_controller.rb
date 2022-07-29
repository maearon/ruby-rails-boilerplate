class Api::RelationshipsController < Api::ApiController
  before_action :logged_in_user

  def create
    @user = User.find(params[:followed_id])
    render json: { follow: true } if current_user.follow(@user)
  end

  def destroy
    @user = Relationship.find(params[:id]).followed
    render json: { unfollow: true } if current_user.unfollow(@user)
  end
end
