class Tag < ApplicationRecord
  has_many :products_tags
  has_many :products, through: :products_tags

  has_and_belongs_to_many :products
end
