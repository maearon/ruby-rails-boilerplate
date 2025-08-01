class Category < ApplicationRecord
  has_many :products

  before_validation :generate_slug, if: -> { slug.blank? && name.present? }

  validates :name, presence: true
  validates :slug, presence: true, uniqueness: true

  private

  def generate_slug
    self.slug = name.parameterize
  end
end
