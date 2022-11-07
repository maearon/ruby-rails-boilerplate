class CreateUsers < ActiveRecord::Migration[7.0]
  def change
    create_table :users do |t|
      t.string :name
      t.string :email
      t.string "refresh_token"
      t.datetime "refresh_token_expiration_at"

      t.timestamps

      t.index %i[email], unique: true, name: 'index_admin_users_email_uniqueness'
      t.index %i[refresh_token], unique: true, name: 'index_admin_users_refresh_token_uniqueness'
    end
  end
end
