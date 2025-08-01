# == Schema Information
#
# Table name: products
#
#  id              :bigint           not null, primary key
#  name            :string
#  model_number    :string           not null, unique
#  product_type    :string
#  brand           :string
#  category        :string
#  sport           :string
#  gender          :string
#  franchise       :string           default(nil)
#  description_h5  :text
#  description_p   :text
#  care            :text
#  specifications  :text
#  is_featured     :boolean          default(false)
#  badge           :string
#  status          :string           default("active")
#  slug            :string
#  category_id     :integer
#  activity        :string
#  material        :string
#  collection      :string
#  created_at      :datetime         not null
#  updated_at      :datetime         not null
#  model_id        :bigint
#  model_base_id   :bigint
#  collaboration_id:bigint
#

class Product < ApplicationRecord
  has_one_attached :image
  has_one_attached :hover_image

  # Associations
  has_many :variants, inverse_of: :product, dependent: :destroy
  accepts_nested_attributes_for :variants, reject_if: :all_blank, allow_destroy: true

  has_many :reviews, dependent: :destroy
  has_many :cart_items, dependent: :destroy
  has_many :wish_items, dependent: :destroy
  has_many :order_items, dependent: :destroy

  has_and_belongs_to_many :tags

  belongs_to :category, optional: true
  belongs_to :model, optional: true
  belongs_to :collaboration, optional: true

  # Constants (phục vụ seed, UI filter, validator)
  FRANCHISE   = %w[Alphabounce Tubular]
  BRAND       = %w[Adidas Nike Puma UnderArmour Reebok Asics Originals Athletics Essentials]
  SPORT       = %w[
    Running Soccer Basketball Tennis Gym Training Golf Hiking Yoga Football Baseball
    Softball Cricket Rugby Skateboarding Weightlifting Volleyball
  ]
  PRODUCTTYPE = %w[
    Sneakers Cleats Sandals Hoodie Pants Shorts Jacket Jersey TShirt TankTop Dress
    Leggings Tracksuit Bra Coat SlipOn Set Uniform
  ]
  GENDER      = %w[Men Women Unisex Kids]
  CATEGORY    = %w[Shoes Apparel Accessories]
  ACTIVITY    = %w[Outdoor Indoor Gym Training]
  MATERIAL    = %w[Leather Mesh Cotton Wool Synthetic Eco]
  COLLECTION  = %w[
    adicolor gazelle samba superstar sportswear supernova terrex ultraboost
    y-3 zne stella_mccartney originals f50 adizero 4d five_ten tiro copa forum
    stan-smith premium_collaborations sporty-and-rich prada disney
    bape bad-bunny edison-chen fear-of-god pharrell
  ]

  # Filter keys FE/backend đều dùng chung
  FILTER_KEYS = %w[
    slug gender category sport activity product_type size color material brand
    model collection min_price max_price shipping sort
  ]

  # Dùng lại trong SlugParserService hoặc FilterService
  FIELD_DICTIONARY = {
    # Gender
    "men" => :gender,
    "women" => :gender,
    "kids" => :gender,
    "unisex" => :gender,
    "boys" => :gender,
    "girls" => :gender,
    "baby" => :gender,
    "babies" => :gender,
    "youth" => :gender,
    "children" => :gender,

    # Category
    "shoes" => :category,
    "clothing" => :category,
    "apparel" => :category,
    "accessories" => :category,
    "bags" => :category,
    "backpacks" => :category,

    # Sport
    "running" => :sport,
    "soccer" => :sport,
    "basketball" => :sport,
    "tennis" => :sport,
    "golf" => :sport,
    "football" => :sport,
    "baseball" => :sport,
    "cycling" => :sport,
    "hiking" => :sport,
    "motorsport" => :sport,
    "workout" => :sport,
    "gym" => :sport,
    "training" => :sport,
    "volleyball" => :sport,
    "yoga" => :sport,
    "rugby" => :sport,
    "swim" => :sport,
    "softball" => :sport,
    "skateboarding" => :sport,
    "weightlifting" => :sport,
    "cricket" => :sport,

    # Activity
    "outdoor" => :activity,
    "indoor" => :activity,

    # Product type (dùng cho filter chi tiết)
    "pants" => :product_type,
    "shorts" => :product_type,
    "t-shirts" => :product_type,
    "tops" => :product_type,
    "hoodies" => :product_type,
    "sweatshirts" => :product_type,
    "jackets" => :product_type,
    "coats" => :product_type,
    "leggings" => :product_type,
    "tights" => :product_type,
    "tracksuits" => :product_type,
    "dresses" => :product_type,
    "skirts" => :product_type,
    "bras" => :product_type,
    "sets" => :product_type,
    "uniforms" => :product_type,
    "slip-on" => :product_type,
    "sneakers" => :product_type,

    # Material
    "eco" => :material,
    "leather" => :material,
    "mesh" => :material,
    "cotton" => :material,
    "synthetic" => :material,

    # Collection / Model
    "adicolor" => :collection,
    "gazelle" => :collection,
    "samba" => :collection,
    "superstar" => :collection,
    "supernova" => :collection,
    "sportswear" => :collection,
    "terrex" => :collection,
    "ultraboost" => :collection,
    "y-3" => :collection,
    "zne" => :collection,
    "tiro" => :collection,
    "f50" => :collection,
    "4d" => :collection,
    "adizero" => :collection,
    "copa" => :collection,
    "stella_mccartney" => :collection,
    "originals" => :collection,
    "forum" => :collection,
    "stan-smith" => :collection,
    "five-ten" => :collection,

    # Collabs
    "bad-bunny" => :collection,
    "bape" => :collection,
    "pharrell" => :collection,
    "prada" => :collection,
    "sporty-and-rich" => :collection,
    "stella-mccartney" => :collection,
    "fear-of-god" => :collection,
    "edison-chen" => :collection,
    "wales-bonner" => :collection,
    "premium_collaborations" => :collection,
    "disney" => :collection
  }.freeze

  # Validations
  validates :name, presence: true, length: { minimum: 1 }
  validates :model_number, presence: true, uniqueness: { case_sensitive: false }, length: { maximum: 13 }

  # Default sorting
  default_scope { order(id: :asc) }

  # Cho phép Ransack query các field này
  def self.ransackable_attributes(_auth_object = nil)
    %w[
      id name brand category franchise gender model_number product_type
      specifications sport description_h5 description_p care
      status badge slug activity material collection created_at updated_at
    ]
  end
end
