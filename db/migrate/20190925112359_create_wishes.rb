class CreateWishes < ActiveRecord::Migration[6.0]
  def change
    create_table :wishes do |t|
      t.references :user, null: false, foreign_key: true

      t.timestamps
    end
  end
end
