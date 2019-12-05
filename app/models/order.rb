class Order < ApplicationRecord
  belongs_to :user
  has_many :order_items, dependent: :destroy
  # accepts_nested_attributes_for :order_items,
  #                               allow_destroy: true

  enum status: { unfinished: 0, finished: 1 }
  # validates :order_number, presence: true

  def list
    order_items
  end

  def total_item
    total_item = 0
    self.order_items.each do |order_item|
      total_item += order_item.quantity.to_i
    end
    total_item
  end

  def total_originalvalue
    order_items.inject(0.0) { |sum, l| sum + l.variant.originalprice * l.quantity }
  end

  def total_value
    order_items.inject(0.0) { |sum, l| sum + l.variant.price * l.quantity }
  end

  def sale
    self.total_value - self.total_originalvalue
  end
end
