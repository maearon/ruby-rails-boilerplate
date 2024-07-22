class Session < ApplicationRecord
  belongs_to :user, foreign_key: 'userId'

  validates :expiresAt, presence: true
end
