class GuestWishItem < ApplicationRecord
  belongs_to :product
  belongs_to :variant
  belongs_to :guest_wish
  validates_uniqueness_of :variant_id, scope: :guest_wish_id
end
