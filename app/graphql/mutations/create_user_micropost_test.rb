require 'test_helper'

class Mutations::CreateUserMicropostTest < ActiveSupport::TestCase
  def perform(user_id: 1, **args)
    Mutations::CreateUserMicropost.new(object: nil, field: nil, context: { user_id: user_id }).resolve(args)
  end

  test 'success' do
    # user = create :user
    # https://www.howtographql.com/graphql-ruby/3-mutations/
    # https://github.com/howtographql/graphql-ruby/blob/master/test/graphql/mutations/create_link_test.rb

    user_micropost = perform(
      content: "Fourth Post",
      user_id: user_id
    )

    assert user_micropost.persisted?
    assert_equal user_micropost.content: "Fourth Post"
    assert_equal user_micropost.user_id, user_id
  end

  test 'failure' do
    assert perform.is_a? GraphQL::ExecutionError
  end
end