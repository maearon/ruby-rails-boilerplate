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
