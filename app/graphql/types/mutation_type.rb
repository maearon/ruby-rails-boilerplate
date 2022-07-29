module Types
  class MutationType < Types::BaseObject
    # TODO: remove me
    # field :test_field, String, null: false,
    #   description: "An example field added by the generator"
    # def test_field
    #   "Hello World"
    # end
    field :create_user, mutation: Mutations::CreateUser
    field :signin_user, mutation: Mutations::SignInUser
    field :create_relationship, mutation: Mutations::CreateRelationship
    field :delete_relationship, mutation: Mutations::DeleteRelationship
    field :create_user_micropost, mutation: Mutations::CreateUserMicropost
  end
end
