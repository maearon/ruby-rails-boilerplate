class GuestCartItem < ApplicationRecord
  belongs_to :product
  belongs_to :variant
  belongs_to :guest_cart
  validates_uniqueness_of :variant_id, scope: :guest_cart_id

  def total_price
    product.price * quantity
  end
end
