class CreateUsersForMailerTest < ActiveRecord::Migration[8.0]
  def change
    create_table :users_for_mailer_tests, id: :text do |t|
      t.string   :name
      t.text     :username, null: false
      t.text     :displayName, null: false
      t.string   :email
      t.string   :refresh_token
      t.datetime :refresh_token_expiration_at
      t.datetime :created_at, null: false
      t.datetime :createdAt, precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
      t.datetime :updated_at, null: false
      t.string   :password_digest
      t.text     :passwordHash
      t.text     :googleId
      t.text     :avatarUrl
      t.text     :bio
      t.string   :remember_digest
      t.boolean  :admin, default: false
      t.string   :activation_digest
      t.boolean  :activated, default: false
      t.datetime :activated_at
      t.string   :reset_digest
      t.datetime :reset_sent_at
      t.boolean  :is_staff, default: false, null: false
      t.boolean  :is_active, default: true, null: false
      t.datetime :date_joined, default: -> { "now()" }, null: false
      t.datetime :last_login
      t.boolean  :is_superuser, default: false, null: false
      t.string   :password, default: "pbkdf2_sha256$720000$mf7gOJi6b6lcClmMxd0UaY$JEXwqKpSjnuNmBE42U9DFtjLO6x2fIPCnOQ9oA59iHo=", null: false
      t.string   :first_name, default: "", null: false
      t.string   :last_name, default: "", null: false
      t.string   :provider, limit: 50
    end

    add_index :users_for_mailer_tests, :email, unique: true, name: "index_mailer_users_email_uniqueness"
    add_index :users_for_mailer_tests, :googleId, unique: true, name: "mailer_users_googleId_key"
    add_index :users_for_mailer_tests, :refresh_token, unique: true, name: "index_mailer_users_refresh_token_uniqueness"
    add_index :users_for_mailer_tests, :username, unique: true, name: "mailer_users_username_key"
  end
end
