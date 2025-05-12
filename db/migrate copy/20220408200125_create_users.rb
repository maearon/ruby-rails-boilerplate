class CreateUsers < ActiveRecord::Migration[7.0]
  def change
    create_table :users, id: :uuid do |t|
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


class CreatePosts < ActiveRecord::Migration[7.1]
  def change
    create_table :posts, id: :uuid do |t|
      t.text :content, null: false
      t.uuid :userId, null: false, foreign_key: true
      t.datetime :createdAt, null: false, default: -> { 'CURRENT_TIMESTAMP' }
    end

    add_foreign_key :posts, :users, column: :userId, on_delete: :cascade
  end
end
