class Api::PostMediasController < Api::ApiController
  before_action :authenticate!, except: %i[create]
  before_action :correct_user, only: :destroy

  def create
    attachment_ids = []
    if post_media_params[:files].present?
      post_media_params[:files].each do |index, file|
        post_media = PostMedia.new
        post_media.file.attach(file)
        if post_media.save
          attachment_ids.push(post_media.id)
        else
          render json: { error: "Failed to save media" }, status: :unprocessable_entity and return
        end
      end
    end
  
    if attachment_ids.any?
      render json: { flash: ["success", "PostMedia created!"], attachments: attachment_ids }
    else
      render json: { error: "No files were uploaded" }, status: :unprocessable_entity
    end
  end

  def destroy
    @post_media.destroy
    render json: { flash: ["success", "PostMedia deleted"] }
  end

  private

  def post_media_params
    params.require(:post_media).permit(files: {})
  end

  def correct_user
    @post_media = current_user.post_medias.find_by(id: params[:id])
    if @post_media.nil?
      render json: { flash: ["error", "PostMedia with id = #{params[:id]} not found!"] }
    end
  end
end
