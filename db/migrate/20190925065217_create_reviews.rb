class CreateReviews < ActiveRecord::Migration[6.0]
  def change
    create_table :reviews do |t|
      t.string :commenter
      t.text :body
      t.references :product, null: false, foreign_key: true

      t.timestamps
    end
  end
end
