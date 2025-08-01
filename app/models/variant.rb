# == Schema Information
#
# Table name: variants
#
#  id               :bigint           not null, primary key
#  price            :float            not null
#  compare_at_price :float
#  stock            :integer
#  color            :string           not null
#  sku              :text
#  product_id       :bigint           not null
#  created_at       :datetime         not null
#  updated_at       :datetime         not null
#

class Variant < ApplicationRecord
  COLOR = %w[
    Black Grey White Red Pink Orange Yellow Green Blue Purple
    Beige Brown Gold Silver Multicolor
  ]

  # == Associations
  belongs_to :product, inverse_of: :variants

  has_many :cart_items, dependent: :destroy
  has_many :wish_items, dependent: :destroy
  has_many :order_items, dependent: :destroy

  has_many :variant_sizes, dependent: :destroy
  has_many :sizes, through: :variant_sizes
  accepts_nested_attributes_for :sizes, reject_if: :all_blank, allow_destroy: true

  has_one_attached :avatar
  has_one_attached :hover
  has_many_attached :images

  # == Validations
  validates :product_id, :color, presence: true

  validates :price, presence: true,
                    numericality: { greater_than_or_equal_to: 0 }

  validates :compare_at_price, numericality: { greater_than_or_equal_to: 0 }, allow_nil: true
  validates :stock, numericality: { only_integer: true, greater_than_or_equal_to: 0 }, allow_nil: true

  validates :variant_code, uniqueness: true, allow_blank: true

  validates :avatar,
            content_type: { in: %w[image/jpeg image/gif image/png],
                            message: "must be a valid image format" },
            size: { less_than: 5.megabytes,
                    message: "should be less than 5MB" }

  # == Default
  default_scope { order(id: :asc) }

  # == Ransack
  def self.ransackable_attributes(_auth_object = nil)
    %w[id color product_id price compare_at_price created_at updated_at]
  end

  def self.ransackable_associations(_auth_object = nil)
    %w[product sizes]
  end
end
