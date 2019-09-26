class CreateProducts < ActiveRecord::Migration[6.0]
  def change
    create_table :products do |t|
      t.string :name
      t.string :jan_code
      t.string :gender
      t.string :franchise
      t.string :producttype
      t.string :brand
      t.string :category
      t.string :sport
      t.text :description_h5
      t.text :description_p
      t.text :specifications
      t.text :care

      t.timestamps
    end
  end
end
