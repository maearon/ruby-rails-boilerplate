# lib/tasks/seed_variant_sizes.rake

namespace :variants do
  desc "Assign sizes to all variants based on product category"
  task assign_sizes: :environment do
    size_map = {
      "Shoes" => "numeric",
      "Apparel" => "alpha",
      "Accessories" => "one_size"
    }

    Variant.includes(:product).find_each do |variant|
      category = variant.product.category
      system = size_map[category]

      if system.nil?
        puts "⚠️ Unknown category #{category} for variant #{variant.id}"
        next
      end

      sizes = Size.where(system: system)
      sizes.each do |size|
        VariantSize.find_or_create_by(variant: variant, size: size) do |vs|
          vs.stock = 0
        end
      end

      puts "✅ Assigned #{sizes.count} sizes to variant #{variant.id} (#{category})"
    end
  end
end
