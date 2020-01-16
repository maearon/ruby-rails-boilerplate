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
  name  = "Example User #{n+1}"
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
  content = 'Content Micropost'
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
i = 1
u = "#{Rails.root.to_s}/app/assets/images/img"
93.times do |i|
  i +=1
  p = Product.create!(name: 'Loose Oversized Shirt',
                      gender: 'Men',
                      franchise: 'Tubular',
                      producttype: 'Wear',
                      brand: 'Originals',
                      category: 'Shoes',
                      sport: 'Running',
                      jan_code: '0886'<<i.to_s,
                      variants_attributes: {
                        0 => {
                          color: 'Black', price: '65', originalprice: '90', sku: 'AQ0886', stock: '1000'
                        },
                        1 => {
                          color: 'Black', price: '65', originalprice: '90', sku: 'AQ0886', stock: '1000'
                        },
                        2 => {
                          color: 'Black', price: '65', originalprice: '90', sku: 'AQ0886', stock: '1000'
                        },
                        3 => {
                          color: 'Black', price: '65', originalprice: '90', sku: 'AQ0886', stock: '1000'
                        },
                      })
  t=i%12
  t=12 if t.zero?
  p.variants.first.avatar.attach(io: File.open(u+'/item'+t.to_s+'.png'), filename: 'item'+t.to_s+'.png', content_type: 'application/png')
  p.variants.first.hover.attach(io: File.open(u+'/item'+t.to_s+'.png'), filename: 'item'+t.to_s+'.png', content_type: 'application/png')
  p.variants.first.images.attach(io: File.open(u+'/detail1.png'), filename: 'detail1.png', content_type: 'application/png')
  p.variants.second.images.attach(io: File.open(u+'/detail2.png'), filename: 'detail2.png', content_type: 'application/png')
  p.variants.third.images.attach(io: File.open(u+'/detail3.png'), filename: 'detail3.png', content_type: 'application/png')
  p.variants.fourth.images.attach(io: File.open(u+'/detail4.png'), filename: 'detail4.png', content_type: 'application/png')
end
