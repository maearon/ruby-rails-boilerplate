module Types
  class MicropostType < Types::BaseObject
    field :id, ID, null: false
    field :content, String, null: false
    # field :user_id, ID, null: false
    field :created_at, DateTimeType, null: false
    field :updated_at, DateTimeType, null: false
    # `posted_by` is automatically camelcased as `postedBy`
    # field can be nil, because we added users relationship later
    # "method" option remaps field to an attribute of Link model
    field :posted_by, UserType, null: false, method: :user
  end
end