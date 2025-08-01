class Cart < ApplicationRecord
  belongs_to :user, optional: true
  has_many :cart_items, dependent: :destroy

  def cart(product, variant, quantity, action)
    current_item = cart_items.find_or_initialize_by(variant: variant)
    current_item.quantity ||= 0
    current_item.quantity = action == 'edit' ? quantity.to_i : current_item.quantity + quantity.to_i
    current_item.product = product
    current_item.cart = self
    current_item.save
  end

  def list
    cart_items
  end

  def total_item
    cart_items.sum(:quantity)
  end

  def total_originalvalue
    cart_items.inject(0.0) { |sum, l| sum + l.variant.originalprice * l.quantity }
  end

  def total_value
    cart_items.inject(0.0) { |sum, l| sum + l.variant.price * l.quantity }
  end

  def sale
    self.total_value - self.total_originalvalue
  end
end
