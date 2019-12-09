class WishItem < ApplicationRecord
  belongs_to :product
  belongs_to :variant
  belongs_to :wish
  validates_uniqueness_of :variant_id, scope: :wish_id
  default_scope { order(created_at: :asc) }
end
