class Api::PostMediasController < Api::ApiController
  before_action :authenticate!, except: %i[create]
  before_action :correct_user, only: :destroy

  def create
    binding.b
    attachment_ids = []
    if params[:media] && params[:media][:files].present?
      params[:media][:files].each do |file|
        media = Media.new
        media.attach_file(file)
        media.save!
        attachment_ids.push(media.id)
      end
    end
    render json: { flash: ["success", "PostMedia created!"], attachments: attachment_ids }
  end

  def destroy
    @post_media.destroy
    render json: { flash: ["success", "PostMedia deleted"] }
  end

  private

  def media_params
    params.require(:media).permit(files: [])
  end

  def correct_user
    @post_media = current_user.post_medias.find_by(id: params[:id])
    if @post_media.nil?
      render json: { flash: ["error", "PostMedia with id = #{params[:id]} not found!"] }
    end
  end
end
