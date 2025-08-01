
variant = Variant.find_by(variant_code: "VC1-BL-bec3")
product = variant.product
product.update!(
  name: "F50 Messi Elite Firm Ground Cleats",
  gender: "Men",
  sport: "Soccer",
  product_type: "Shoes",
  category: Category.find_by!(name: "Shoes"),
  category_id: Category.find_by!(name: "Shoes").id
)
variant.update!(
  color: "Cloud White / Lucid Red / Silver Metallic"
)
puts "✅ Updated product #{product.id} info"
dir_path = Rails.root.join("app/assets/images/products/1")
variant.images.each(&:purge)
detail_images = Dir.glob("#{dir_path}/*.jpg").sort_by { |path| File.mtime(path) }
detail_images.each do |img_path|
  variant.images.attach(
    io: File.open(img_path),
    filename: File.basename(img_path),
    content_type: "image/jpeg"
  )
end
puts "✅ Attached #{detail_images.count} detail images to variant #{variant.variant_code}"
