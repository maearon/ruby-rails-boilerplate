UPDATE products
SET category_id = 1
WHERE category_id IS NULL;

Product.find_each do |product|
  new_name = product.name.to_s.split.map(&:upcase).join(' ')
  product.update!(name: new_name)
end
