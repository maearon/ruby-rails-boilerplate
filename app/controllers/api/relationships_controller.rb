class Api::RelationshipsController < Api::ApiController
  before_action :authenticate!

  def create
    user = User.find(params[:followed_id])
    render json: { follow: true } if current_user.follow(user)
  end

  def destroy
    relationship = current_user.active_relationships.find_by(followed_id: params[:id])
    user = Relationship.find(relationship.id).followed
    render json: { unfollow: true } if current_user.unfollow(user)
  end
end
