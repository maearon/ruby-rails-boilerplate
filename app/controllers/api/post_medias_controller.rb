class Api::PostMediasController < Api::ApiController
  include Rails.application.routes.url_helpers

  before_action :authenticate!, except: %i[create]
  before_action :correct_user, only: :destroy

  def create
    attachment_ids = []
    errors = []
  
    if post_media_params[:files].present?
      post_media_params[:files].each do |index, file|
        media_type = determine_media_type(file)
        
        if media_type.nil?
          errors << "Unsupported file type for file #{file.original_filename}"
          next
        end
  
        @post_media = PostMedia.new(media_type: media_type)
        if @post_media.file.attached?
          @post_media.file.purge
        end
        @post_media.file.attach(file)
        @post_media.id = SecureRandom.uuid
        @post_media.url = "https://via.placeholder.com/150/FF0000/FFFFFF?Text=yttags.com"
  
        if @post_media.save
          @post_media.update(url: rails_blob_url(@post_media.file, only_path: false)) if @post_media.file.attached?
          attachment_ids << @post_media.id
        else
          errors.concat(@post_media.errors.full_messages)
        end
      end
    end
  
    if errors.empty?
      render json: { flash: ["success", "Files uploaded!"], attachments: attachment_ids }
    else
      render json: { error: errors }, status: :unprocessable_entity
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

  def determine_media_type(file)
    content_type = file.content_type.downcase
    extension = File.extname(file.original_filename).downcase

    image_types = %w[.jpg .jpeg .png .gif .bmp .webp .tiff .svg]
    video_types = %w[.mp4 .avi .mov .wmv .flv .webm .mkv .m4v]

    if content_type.start_with?('image/') || image_types.include?(extension)
      'image'
    elsif content_type.start_with?('video/') || video_types.include?(extension)
      'video'
    else
      nil # Unsupported file type
    end
  end

  def correct_user
    @post_media = current_user.post_medias.find_by(id: params[:id])
    if @post_media.nil?
      render json: { flash: ["error", "PostMedia with id = #{params[:id]} not found!"] }
    end
  end
end
