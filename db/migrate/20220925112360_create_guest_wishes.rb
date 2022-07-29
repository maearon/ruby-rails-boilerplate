class CreateGuestWishes < ActiveRecord::Migration[6.0]
  def change
    create_table :guest_wishes do |t|

      t.timestamps
    end
  end
end
