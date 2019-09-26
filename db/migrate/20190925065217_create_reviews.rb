class CreateReviews < ActiveRecord::Migration[6.0]
  def change
    create_table :reviews do |t|
      t.string :reviewer
      t.text :content
      t.references :product, null: false, foreign_key: true

      t.timestamps
    end
  end
end
