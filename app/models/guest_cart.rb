class GuestCart < ApplicationRecord
  has_many :guest_cart_items, dependent: :destroy

  def cart(product, variant, quantity, action)
    if current_item = guest_cart_items.find_by(variant: variant)
      current_item.quantity ||= 1
      action == 'edit' ? current_item.quantity = quantity.to_i : current_item.quantity += quantity.to_i
      current_item.save
    else
      guest_cart_items.create(product: product,variant: variant, guest_cart: self, quantity: quantity)
    end
  end

  def total_item
    guest_cart_items.inject(0) { |sum, l| sum + l.quantity }
  end

  def total_originalvalue
    guest_cart_items.inject(0.0) { |sum, l| sum + l.variant.originalprice * l.quantity }
  end

  def total_value
    guest_cart_items.inject(0.0) { |sum, l| sum + l.variant.price * l.quantity }
  end

  def sale
    self.total_value - self.total_originalvalue
  end
end
