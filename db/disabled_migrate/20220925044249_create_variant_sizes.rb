class CreateVariantSizes < ActiveRecord::Migration[6.0]
  def change
    create_table :variant_sizes do |t|
      t.references :variant, null: false, foreign_key: true
      t.references :size, null: false, foreign_key: true
      t.integer :stock, default: 0

      t.timestamps
    end

    add_index :variant_sizes, [:variant_id, :size_id], unique: true
  end
end
