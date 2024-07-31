class Api::MicropostsController < Api::ApiController
  before_action :authenticate!, except: %i[create]
  before_action :correct_user,   only: :destroy
  def create
    @micropost = Micropost.new(micropost_params.except(:image))
    @micropost.image.attach(params[:micropost][:image]) if params[:micropost] && params[:micropost][:image].present?
    @micropost.content = micropost_params[:content] if micropost_params[:content].present?
    @micropost.user_id = current_user.id if current_user.present?
    # binding.b
    # @micropost = current_user.microposts.build(micropost_params)
    # @micropost.image.attach(params[:micropost][:image])
    if @micropost.save
      render json: { flash: ["success", "Micropost created!"] }
    else
      # @feed_items = current_user.feed.page(params[:page])
      render json: { error: @micropost.errors.full_messages }
    end
  end
  def destroy
    @micropost.destroy
    render json: { flash: ["success", "Micropost deleted"] }
  end
  private
    def micropost_params
      params.require(:micropost).permit(:content, :image)
    end
    def correct_user
      @micropost = current_user.microposts.find_by(id: params[:id])
      render json: { flash: ["success", "Micropost with id = #{params[:id]} not found!"] } if @micropost.nil?
    end
end
