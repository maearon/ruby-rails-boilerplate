class Post < ApplicationRecord
  belongs_to :user, foreign_key: 'userId'
  has_many :media, dependent: :destroy
  has_many_attached :files
  has_many :likes
  has_many :bookmarks
  has_many :comments
  has_many :linked_notifications, class_name: 'Notification'

  validates :content, presence: true, length: { maximum: 140 }

  after_create :attach_media_files

  def attach_media_files
    Media.where(id: self.media_ids).update_all(post_id: self.id)
  end
end
