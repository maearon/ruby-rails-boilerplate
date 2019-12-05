class OrderItem < ApplicationRecord
  belongs_to :product
  belongs_to :variant
  belongs_to :order
  validates_uniqueness_of :variant_id, scope: :order_id

  def total_price
    variant.price * quantity
  end
end
