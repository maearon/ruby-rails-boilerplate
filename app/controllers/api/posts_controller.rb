class Api::PostsController < Api::ApiController
  before_action :authenticate!, except: %i[create]
  before_action :correct_user, only: :destroy

  def create
    binding.b
    @post = Post.new(post_params.except(:mediaIds))
    if params[:post] && params[:post][:mediaIds].present?
      params[:post][:mediaIds].each do |id|
        media = Media.find(id)
        Rails.logger.debug("Attaching Image: #{media.file.inspect}")
        @post.files.attach(media.file)
      end
    end
    @post.content = post_params[:content] if post_params[:content].present?
    @post.userId = post_params[:userId] if post_params[:userId].present?
    @post.id = SecureRandom.uuid
    
    if @post.save
      render json: { flash: ["success", "Post created!"], post: @post }
    else
      render json: { error: @post.errors.full_messages }
    end
  end

  def destroy
    @post.destroy
    render json: { flash: ["success", "Post deleted"] }
  end

  private

  def post_params
    params.require(:post).permit(:content, :userId, mediaIds: [])
  end

  def correct_user
    @post = current_user.posts.find_by(id: params[:id])
    if @post.nil?
      render json: { flash: ["error", "Post with id = #{params[:id]} not found!"] }
    end
  end
end
