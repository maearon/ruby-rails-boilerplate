# Create a main sample user.
User.create!(name:  "Example User",
             email: "example@railstutorial.org",
             password:              "foobar",
             password_confirmation: "foobar",
             admin:     true,
             activated: true,
             activated_at: Time.zone.now)

# Generate a bunch of additional users.
99.times do |n|
  name  = Faker::Name.name
  email = "example-#{n+1}@railstutorial.org"
  password = "password"
  User.create!(name:  name,
              email: email,
              password:              password,
              password_confirmation: password,
              activated: true,
              activated_at: Time.zone.now)
end

# Generate microposts for a subset of users.
users = User.order(:created_at).take(6)
50.times do
  content = Faker::Lorem.sentence(word_count: 5)
  users.each { |user| user.microposts.create!(content: content) }
end

# Create following relationships.
users = User.all
user  = users.first
following = users[2..50]
followers = users[3..40]
following.each { |followed| user.follow(followed) }
followers.each { |follower| follower.follow(user) }

# Generate a bunch of additional products.
u = "#{Rails.root.to_s}/app/assets/images/products"
93.times do |i|
  i +=1
  p = Product.create!(name: 'Tubular Shadow Shoes',
                      gender: 'Men',
                      franchise: 'Tubular',
                      producttype: 'Underwear',
                      brand: 'Originals',
                      category: 'Shoes',
                      sport: 'Running',
                      jan_code: '0886'<<i.to_s,
                      variants_attributes: {
                        0 => {
                          color: 'Black', price: '70', originalprice: '100', sku: 'AQ0886', stock: '1000'
                        },
                      })
  p.variants.first.avatar.attach(io: File.open(u+'/'+i.to_s+'/'+i.to_s+'.jpg'), filename: i.to_s+'.jpg', content_type: 'application/jpg')
  p.variants.first.images.attach(io: File.open(u+'/'+i.to_s+'/'+i.to_s+'dt1.jpg'), filename: i.to_s+'.jpg', content_type: 'application/jpg')
end
