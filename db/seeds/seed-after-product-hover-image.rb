product = Product.find(3)

# 🧹 Xoá ảnh cũ nếu có
product.image.purge if product.image.attached?
product.hover_image.purge if product.hover_image.attached?

# 📁 Đường dẫn đến thư mục thumbnail
thumbnail_dir = Rails.root.join("app/assets/images/products/93/thumbnail")

# 📄 Lấy danh sách ảnh và sắp xếp
image_files = Dir.glob("#{thumbnail_dir}/*.jpg").sort_by { |path| File.basename(path).downcase }

# ✅ Gắn ảnh nếu đủ file
if image_files[0] && image_files[1]
  product.image.attach(
    io: File.open(image_files[0]),
    filename: File.basename(image_files[0]),
    content_type: "image/jpeg"
  )

  product.hover_image.attach(
    io: File.open(image_files[1]),
    filename: File.basename(image_files[1]),
    content_type: "image/jpeg"
  )
else
  puts "❌ Không tìm thấy đủ ảnh trong #{thumbnail_dir}"
end

# 🔎 Tìm variant theo variant_code
variant = Variant.find_by(variant_code: "JP55933")

if variant
  # 🧹 Xoá ảnh cũ của variant nếu có
  variant.avatar.purge if variant.avatar.attached?
  variant.hover.purge if variant.hover.attached?
  variant.images.each(&:purge)

  # 📁 Đường dẫn thư mục chứa ảnh variant
  variant_dir = Rails.root.join("app/assets/images/products/1")
  
  # 📜 Danh sách ảnh mong muốn (theo tên chính xác)
  image_filenames = [
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM1.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM3.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM4.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM5.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM6.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM7.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM8.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM9.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM10.jpg",
    "F50_Messi_Elite_Firm_Ground_Cleats_White_JP5593_HM11.jpg",
  ]

  # 🔎 Tìm đúng file ảnh tương ứng trong thư mục
  variant_images = image_filenames.map do |filename|
    path = File.join(variant_dir, filename)
    File.exist?(path) ? path : nil
  end.compact

  if variant_images.size < 2
    puts "⚠️ Không đủ ảnh để gắn avatar & hover"
  else
    # ✅ Gắn avatar và hover từ ảnh đầu và thứ hai
    variant.avatar.attach(
      io: File.open(variant_images[0]),
      filename: File.basename(variant_images[0]),
      content_type: "image/jpeg"
    )
    puts "✅ Attached variant avatar: #{File.basename(variant_images[0])}"

    variant.hover.attach(
      io: File.open(variant_images[1]),
      filename: File.basename(variant_images[1]),
      content_type: "image/jpeg"
    )
    puts "✅ Attached variant hover: #{File.basename(variant_images[1])}"
  end

  # ✅ Gắn toàn bộ ảnh variant (theo đúng thứ tự đã khai báo)
  variant_images.each do |path|
    variant.images.attach(
      io: File.open(path),
      filename: File.basename(path),
      content_type: "image/jpeg"
    )
    puts "✅ Attached variant image: #{File.basename(path)}"
  end
else
  puts "❌ Variant with code 'JP55933' not found"
end

puts "🎉 Done updating images for product ##{product.id} and variant 'JP55933'"
