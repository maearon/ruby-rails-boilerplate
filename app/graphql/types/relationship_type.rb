module Types
  class RelationshipType < Types::BaseObject
    field :id, ID, null: false
    field :follower_id, UserType, null: false, method: :user
    field :followed_id, UserType, null: false, method: :user
    field :created_at, DateTimeType, null: false
    field :updated_at, DateTimeType, null: false
  end
end