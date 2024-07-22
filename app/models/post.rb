class Post < ApplicationRecord
  belongs_to :user, foreign_key: 'userId'

  has_many :attachments, class_name: 'Media'
  has_many :likes
  has_many :bookmarks
  has_many :comments
  has_many :linked_notifications, class_name: 'Notification'

  validates :content, presence: true
end
