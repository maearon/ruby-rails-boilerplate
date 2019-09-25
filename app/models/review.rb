class Review < ApplicationRecord
  validates :commenter, presence: true,
  length: { minimum: 1 }
  validates :body, presence: true,
  length: { minimum: 3 }
  belongs_to :product
end
