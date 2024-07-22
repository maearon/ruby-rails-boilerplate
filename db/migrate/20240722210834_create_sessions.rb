class CreateSessions < ActiveRecord::Migration[7.1]
  def change
    create_table :sessions, id: :uuid do |t|
      t.uuid :userId, null: false, foreign_key: true
      t.datetime :expiresAt, null: false
    end

    add_foreign_key :sessions, :users, column: :userId, on_delete: :cascade
  end
end
