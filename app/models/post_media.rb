class PostMedia < ApplicationRecord
  belongs_to :post, optional: true
  has_one_attached :file do |attachable|
    attachable.variant :display, resize_to_limit: [500, 500]
  end

  enum media_type: { image: 'IMAGE', video: 'VIDEO' }

  validates :file, presence: true
  validates :url, presence: true, allow_nil: true

  # after_save :set_url

  # private

  # def set_url
  #   if file.attached?
  #     self.url = "#{Rails.application.config.action_controller.asset_host}#{Rails.application.routes.url_helpers.rails_blob_path(file, only_path: true)}"
  #     save if url.present? # Save again to persist the URL
  #   end
  # end

  # def file_attached_and_url_blank?
  #   file..attached? && url.blank?
  # end

  # def set_url
  #   if file.attached? && url.blank?
  #     self.url = Rails.application.routes.url_helpers.rails_blob_path(file, only_path: true)
  #     save if url.present? # Save again to persist the URL
  #   end
  # end
end
