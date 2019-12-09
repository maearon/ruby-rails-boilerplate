class CartItem < ApplicationRecord
  belongs_to :product
  belongs_to :variant
  belongs_to :cart
  validates_uniqueness_of :variant_id, scope: :cart_id
  default_scope { order(created_at: :asc) }

  def total_price
    variant.price * quantity
  end
end
