# == Schema Information
#
# Table name: products
class Product < ApplicationRecord
  GENDER = %w{ Men Women Kids }
  FRANCHISE = %w{ Alphabounce Tubular }
  PRODUCTTYPE = %w{ Wear Underwear Pants }
  BRAND = %w{ Originals Athletics Essentials }
  CATEGORY = %w{ Shoes Compression Accessories Apparel }
  SPORT = %w{ Running Soccer Football }

  has_many :variants, inverse_of: :product, dependent: :destroy
  accepts_nested_attributes_for :variants, reject_if: :all_blank, allow_destroy: true
  has_many :reviews, dependent: :destroy
  has_many :cart_items, dependent: :destroy
  has_many :wish_items, dependent: :destroy
  has_many :order_items, dependent: :destroy

  validates :name, presence: true
  validates :jan_code, presence: true, uniqueness: {case_sensitive: false},
    length: {maximum: 13}
  validates :name, presence: true,
  length: { minimum: 1 }

  default_scope { order(id: :asc) }

  # Allowlist of columns allowed for searching
  def self.ransackable_attributes(auth_object = nil)
    %w[
      id
      name
      brand
      category
      franchise
      gender
      jan_code
      producttype
      specifications
      sport
      description_h5
      description_p
      care
      created_at
      updated_at
    ]
  end
end
