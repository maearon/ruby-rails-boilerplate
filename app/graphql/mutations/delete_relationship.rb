module Mutations
  class DeleteRelationship < BaseMutation
    argument :id, ID, required: false

    type Types::RelationshipType

    def resolve(id: nil)
      # Vote.create!(
      #   link: Link.find(link_id),
      #   user: context[:current_user]
      # )

      # binding.pry
      @user = Relationship.find(id).followed
      context[:current_user].unfollow(@user)
      {
        id: id,
      }

      # Relationship.destroy!(
      #   id
      # )

      # post = Post.find(id)
      # if post.user != context[:current_user]
      #   raise GraphQL::ExecutionError, "You are not authorized!"
      # end
      # post.destroy
      # {
      #   id: id,
      # }
    rescue ActiveRecord::RecordInvalid => e
      GraphQL::ExecutionError.new("Invalid input: #{e.record.errors.full_messages.join(', ')}")
    end
  end
end