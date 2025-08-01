# app/views/api/products/show.json.jbuilder

json.extract! @product, :id, :name, :model_number, :gender, :franchise, :product_type,
                         :brand, :sport, :description_h5, :description_p,
                         :specifications, :care, :created_at, :updated_at
json.category @product.category&.name.to_s
json.tags @product.tags.pluck(:name)

json.variant_code @variant.variant_code
json.title @product.name
json.slug @product.slug
json.currencyId currency_code(locale.to_s)
json.currencyFormat I18n.t("number.currency.format.unit", locale: locale.to_s)
json.isFreeShipping true

# main image
begin
  main_image = @product.image.attached? ? url_for(@product.image.variant(resize_to_limit: [500, 500])) : "/placeholder.svg"
rescue
  main_image = "/placeholder.svg"
end
json.main_image_url "#{request.base_url}#{main_image}"

# hover image
begin
  hover_image = @product.hover_image.attached? ? url_for(@product.hover_image.variant(resize_to_limit: [500, 500])) : "/placeholder.svg"
rescue
  hover_image = "/placeholder.svg"
end
json.hover_image_url "#{request.base_url}#{hover_image}"

# --- Variants for sale display ---
json.variants @product.variants do |variant|
  json.id variant.id
  json.color variant.color
  json.price variant.price
  json.compare_at_price variant.compare_at_price
  json.variant_code variant.variant_code
  json.stock variant.stock
  json.sizes variant.sizes.pluck(:label)
  json.product_id variant.product_id
  json.created_at variant.created_at
  json.updated_at variant.updated_at

  # avatar image fallback
  begin
    avatar_path = variant.avatar.attached? ? url_for(variant.avatar.variant(resize_to_limit: [500, 500])) : "/placeholder.svg?height=300&width=250"
  rescue
    avatar_path = "/placeholder.svg?height=300&width=250"
  end
  json.avatar_url "#{request.base_url}#{avatar_path}"

  # detail images (skip attached? check — already attached)
  detail_images = variant.images.map do |image|
    begin
      url_for(image.variant(resize_to_limit: [500, 500]))
    rescue
      nil
    end
  end.compact
  json.image_urls detail_images.map { |path| "#{request.base_url}#{path}" }

  # fallback main + hover image (repeated for consistency)
  begin
    image_path = @product.image.attached? ? url_for(@product.image.variant(resize_to_limit: [500, 500])) : "/placeholder.svg?height=300&width=250"
  rescue
    image_path = "/placeholder.svg?height=300&width=250"
  end

  begin
    hover_path = @product.hover_image.attached? ? url_for(@product.hover_image.variant(resize_to_limit: [500, 500])) : "/placeholder.svg?height=300&width=250"
  rescue
    hover_path = "/placeholder.svg?height=300&width=250"
  end

  json.image_url "#{request.base_url}#{image_path}"
  json.hover_image_url "#{request.base_url}#{hover_path}"
end

# Optional info
json.breadcrumb @breadcrumb if defined?(@breadcrumb)
json.related_products @related_products if defined?(@related_products)
