# bin/rails generate model Collaboration name:string slug:string:uniq
# db/migrate/xxxx_create_collaborations.rb
create_table :collaborations do |t|
  t.string :name, null: false
  t.string :slug, null: false

  t.timestamps
end
add_index :collaborations, :slug, unique: true
