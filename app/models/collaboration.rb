class Collaboration < ApplicationRecord
  has_many :products

  validates :name, :slug, presence: true
  validates :slug, uniqueness: true
end
