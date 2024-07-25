class PostMedia < ApplicationRecord
  belongs_to :post, optional: true
  has_one_attached :file do |attachable|
    attachable.variant :display, resize_to_limit: [500, 500]
  end

  enum media_type: { image: 'IMAGE', video: 'VIDEO' }

  validates :file, presence: true
  validates :url, presence: true, allow_nil: true

  # after_save :update_url

  # private

  # def update_url
  #   if file.attached?
  #     self.url = Rails.application.routes.url_helpers.rails_blob_url(file, only_path: true)
  #     save if url_changed?
  #   end
  # end
end
