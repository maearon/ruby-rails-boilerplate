class CreateGuestWishItems < ActiveRecord::Migration[6.0]
  def change
    create_table :guest_wish_items do |t|
      t.references :guest_wish, null: false, foreign_key: true
      t.references :product, null: false, foreign_key: true
      t.references :variant, null: false, foreign_key: true

      t.timestamps
    end
  end
end
