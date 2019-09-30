class Review < ApplicationRecord
  validates :reviewer, presence: true,
  length: { minimum: 1 }
  validates :content, presence: true,
  length: { minimum: 3 }
  belongs_to :product
end
