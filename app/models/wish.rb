class Wish < ApplicationRecord
  belongs_to :user, optional: true
  has_many :wish_items, dependent: :destroy

  def list
    wish_items
  end

  # Wishes a product.
  def wish(product, variant)
    wish_items.create(product: product,variant: variant, wish: self)
  end

  # Unwishes a product.
  def unwish(current_item)
    wish_items.delete(current_item)
  end

  # Returns true if the current user is following the other user.
  def wishing?(product, variant)
    current_item = wish_items.find_by(variant: variant)
    wish_items.include?(current_item)
  end

  def total_item
    wish_items.count
  end
end
