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
