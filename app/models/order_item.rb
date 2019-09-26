class OrderItem < ApplicationRecord
  belongs_to :product
  belongs_to :variant
  belongs_to :order
  validates_uniqueness_of :variant_id, scope: :cart_id

  def total_price
    product.price * quantity
  end
end
