class Model < ApplicationRecord
  has_many :products
  belongs_to :model_base

  validates :name, presence: true

  before_validation :generate_slug, if: -> { slug.blank? && name.present? }

  private

  def generate_slug
    self.slug = name.parameterize
  end
end
