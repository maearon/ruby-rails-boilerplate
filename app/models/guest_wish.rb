class GuestWish < ApplicationRecord
  has_many :guest_wish_items, dependent: :destroy

  # Wishes a product.
  def wish(product, variant)
    guest_wish_items.create(product: product,variant: variant, guest_wish: self)
  end

  # Unwishes a product.
  def unwish(current_item)
    guest_wish_items.delete(current_item)
  end

  # Returns true if the current user is following the other user.
  def wishing?(product, variant)
    current_item = guest_wish_items.find_by(variant: variant)
    guest_wish_items.include?(current_item)
  end

  def total_item
    guest_wish_items.inject(0) { |sum, l| sum + 1 }
  end
end
