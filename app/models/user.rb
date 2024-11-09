class User < ApplicationRecord
  include RefreshTokenUpdatable

  # Accessor for temporary tokens
  attr_accessor :remember_token, :activation_token, :reset_token

  # Associations
  has_many :sessions, foreign_key: 'userId', dependent: :destroy
  has_many :microposts, dependent: :destroy
  has_many :posts, foreign_key: 'userId', dependent: :destroy
  has_many :active_relationships, class_name: "Relationship",
                                  foreign_key: "follower_id",
                                  dependent: :destroy
  has_many :passive_relationships, class_name: "Relationship",
                                   foreign_key: "followed_id",
                                   dependent: :destroy
  has_many :following, through: :active_relationships, source: :followed
  has_many :followers, through: :passive_relationships, source: :follower

  # Attachments
  has_one_attached :avatar do |attachable|
    attachable.variant :display, resize_to_limit: [500, 500]
  end

  # Callbacks
  before_save :downcase_email
  # before_create :create_activation_digest

  # Validations
  validates :name, presence: true, length: { maximum: 50 }
  VALID_EMAIL_REGEX = /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i
  validates :email, presence: true, length: { maximum: 255 },
                    format: { with: VALID_EMAIL_REGEX },
                    uniqueness: true
  validates :password, presence: true, length: { minimum: 6 }, allow_nil: true
  validates :refresh_token, uniqueness: true, allow_nil: true

  # Custom validation (potentially user-defined method)
  validates_by_type(type: :string, except: %i[email password_digest refresh_token], opt: STRING_VALIDATION)

  # Associations for carts, wishes, orders, and reviews
  has_one :cart, dependent: :destroy
  has_one :wish, dependent: :destroy
  has_many :orders, dependent: :destroy
  has_many :reviews, dependent: :destroy

  # Attributes for tokens
  attribute :token, :string
  attribute :token_expiration_at, :string

  # Instance Methods
  def auth?(password)
    authenticate(password)
  end

  def generate_tokens!
    access_token, access_token_expiration_at, refresh_token, refresh_token_expiration_at = Jwt::User::EncodeTokenService.call(id)
    update_refresh_token!(refresh_token, refresh_token_expiration_at)
    self.token = access_token
    self.token_expiration_at = access_token_expiration_at
  end

  # Class Methods
  def self.digest(string)
    cost = ActiveModel::SecurePassword.min_cost ? BCrypt::Engine::MIN_COST : BCrypt::Engine.cost
    BCrypt::Password.create(string, cost: cost)
  end

  def self.new_token
    SecureRandom.urlsafe_base64
  end

  private

  def downcase_email
    self.email = email.downcase
  end

  def admin?
    self.admin
  end

  # def create_activation_digest
  #   self.activation_token = User.new_token
  #   self.activation_digest = User.digest(activation_token)
  # end
end
