class CreateOrderItems < ActiveRecord::Migration[6.0]
  def change
    create_table :order_items do |t|
      t.integer :quantity
      t.references :order, null: false, foreign_key: true
      t.references :product, null: false, foreign_key: true
      t.references :variant, null: false, foreign_key: true

      t.timestamps
    end
  end
end
