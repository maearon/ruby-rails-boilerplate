class CreateGuestCarts < ActiveRecord::Migration[6.0]
  def change
    create_table :guest_carts do |t|

      t.timestamps
    end
  end
end
