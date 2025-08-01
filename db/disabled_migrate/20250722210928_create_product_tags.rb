# bin/rails generate model ProductsTag product:references tag:references
# db/migrate/xxxx_create_products_tags.rb
create_table :products_tags do |t|
  t.references :product, null: false, foreign_key: true
  t.references :tag, null: false, foreign_key: true

  t.timestamps
end
