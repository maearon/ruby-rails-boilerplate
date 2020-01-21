class Review < ApplicationRecord
  validates :content, presence: true,
  length: { minimum: 3 }
  belongs_to :product
  belongs_to :user
end
