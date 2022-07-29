module Types
  class QueryType < Types::BaseObject
    # Add `node(id: ID!) and `nodes(ids: [ID!]!)`
    include GraphQL::Types::Relay::HasNodeField
    include GraphQL::Types::Relay::HasNodesField

    # Add root-level fields here.
    # They will be entry points for queries on your schema.

    # TODO: remove me
    # field :test_field, String, null: false,
    #   description: "An example field added by the generator"
    # def test_field
    #   "Hello World!"
    # end

    # queries are just represented as fields
    # `all_links` is automatically camelcased to `allLinks`
    field :all_users, [UserType], null: false
    # field :all_links, resolver: Resolvers::LinksSearch

    # this method is invoked, when `all_link` fields is being resolved
    def all_users
      User.all
    end
  end
end
