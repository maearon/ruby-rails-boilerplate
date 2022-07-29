class CreateGuestCartItems < ActiveRecord::Migration[6.0]
  def change
    create_table :guest_cart_items do |t|
      t.integer :quantity
      t.references :guest_cart, null: false, foreign_key: true
      t.references :product, null: false, foreign_key: true
      t.references :variant, null: false, foreign_key: true

      t.timestamps
    end
  end
end
