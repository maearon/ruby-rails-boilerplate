puts "🧼 Clearing sizes..."
Size.destroy_all
ActiveRecord::Base.connection.reset_pk_sequence!("sizes")

puts "🧼 Clearing variant_sizes..."
VariantSize.destroy_all
ActiveRecord::Base.connection.reset_pk_sequence!("variant_sizes")

puts "📦 Seeding sizes..."

ALPHA_SIZES   = %w[XS S M L XL XXL]
NUMERIC_SIZES = (36..45).to_a.map(&:to_s)
LOCATIONS     = %w[US VN]

LOCATIONS.each do |loc|
  ALPHA_SIZES.each do |label|
    Size.create!(
      label: label,
      system: "alpha",
      location: loc
    )
  end

  NUMERIC_SIZES.each do |label|
    Size.create!(
      label: label,
      system: "numeric",
      location: loc
    )
  end
end

# One size dùng cho phụ kiện
Size.create!(
  label: "One Size",
  system: "one_size",
  location: "GLOBAL"
)

puts "✅ Done seeding sizes: #{Size.count} entries."
