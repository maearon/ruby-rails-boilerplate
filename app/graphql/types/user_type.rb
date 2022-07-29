# frozen_string_literal: true

module Types
  class UserType < Types::BaseObject
    field :id, ID, null: false
    field :name, String, null: false
    field :email, String, null: false
    field :admin, Boolean, null: false
    field :created_at, DateTimeType, null: false
    field :updated_at, DateTimeType, null: false
    field :microposts, [Types::MicropostType]
  end
end
