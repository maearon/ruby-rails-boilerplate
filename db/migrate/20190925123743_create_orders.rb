class CreateOrders < ActiveRecord::Migration[6.0]
  def change
    create_table :orders do |t|
      t.string :method
      t.string :status
      t.string :details

      t.timestamps
    end
  end
end
