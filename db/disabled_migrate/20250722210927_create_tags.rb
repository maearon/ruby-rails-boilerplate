# bin/rails generate model Tag name:string slug:string:uniq
# db/migrate/xxxx_create_tags.rb
create_table :tags do |t|
  t.string :name, null: false
  t.string :slug, null: false

  t.timestamps
end
add_index :tags, :slug, unique: true
