class PostMedia < ApplicationRecord
  belongs_to :post, optional: true
  has_one_attached :file

  enum media_type: { image: 'IMAGE', video: 'VIDEO' }

  validates :file, presence: true
  validates :url, presence: true, allow_nil: true
end
