module Mutations
  class CreateRelationship < BaseMutation
    argument :followed_id, ID, required: false

    type Types::RelationshipType

    def resolve(followed_id: nil)
      # Vote.create!(
      #   link: Link.find(link_id),
      #   user: context[:current_user]
      # )

      # binding.pry
      # @user = User.find(followed_id)
      # context[:current_user].follow(@user)

      Relationship.create!(
        follower_id: context[:current_user].id,
        followed_id: followed_id
      )
    rescue ActiveRecord::RecordInvalid => e
      GraphQL::ExecutionError.new("Invalid input: #{e.record.errors.full_messages.join(', ')}")
    end
  end
end