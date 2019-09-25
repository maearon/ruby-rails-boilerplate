class Order < ApplicationRecord
  has_many :order_items, dependent: :destroy
  accepts_nested_attributes_for :order_items,
                                allow_destroy: true

  enum status: { unfinished: 0, finished: 1 }
  validates :order_number, presence: true
end
