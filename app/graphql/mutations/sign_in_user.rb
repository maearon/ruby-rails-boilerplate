module Mutations
  class SignInUser < BaseMutation
    null true

    argument :credentials, Types::AuthProviderCredentialsInput, required: false

    field :token, String, null: true
    field :user, Types::UserType, null: true

    def resolve(credentials: nil)
      # basic validation
      return unless credentials

      user = User.find_by email: credentials[:email]

      # ensures we have the correct user
      return unless user
      return unless user.authenticate(credentials[:password])

      # use Ruby on Rails - ActiveSupport::MessageEncryptor, to build a token
      # undefined method `byteslice' for nil:NilClass
      # Code from tutorial is wrong, 
      # successfully used this instead: 
      # https://github.com/howtographql/graphql-ruby/blob/master/app/graphql/mutations/sign_in_user.rb
      # In https://github.com/howtographql/graphql-ruby/blob/master/app/models/auth_token.rb 
      # >>>Line 21 Rails.application.secrets.secret_key_base.byteslice(0..31)
      crypt = ActiveSupport::MessageEncryptor.new(Rails.application.secrets.secret_key_base.byteslice(0..31))
      token = crypt.encrypt_and_sign("user-id:#{ user.id }")

      context[:session][:token] = token

      { user: user, token: token }
    end
  end
end