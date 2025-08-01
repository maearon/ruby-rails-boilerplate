# == Schema Information
#
# Table name: sizes
class Size < ApplicationRecord
  has_many :variant_sizes
  has_many :variants, through: :variant_sizes
  # belongs_to :variant

  validates :label, presence: true
  validates :system, presence: true

  def total_stock
    variant_sizes.sum(:stock)
  end

  def self.ransackable_attributes(auth_object = nil)
    %w[id label system stock variant_id created_at updated_at]
  end
end
