json.products @products do |product|
  variant = product.variants.first

  json.id product.id
  json.model_number product.model_number
  json.title product.name
  json.name product.name
  json.tags product.tags.pluck(:name)
  json.description product.description_p || product.description
  json.description_h5 product.description_h5
  json.specifications product.specifications
  json.care product.care

  json.gender product.gender
  json.franchise product.franchise
  json.product_type product.product_type
  json.brand product.brand
  json.category product.category&.name
  json.sport product.sport

  json.currencyId currency_code(locale.to_s)
  json.currencyFormat I18n.t("number.currency.format.unit", locale: locale.to_s)
  json.isFreeShipping true

  json.availableSizes variant&.sizes&.pluck(:label)&.uniq || []
  json.price variant&.price
  json.compare_at_price variant&.compare_at_price
  json.installments variant&.stock

  json.created_at product.created_at
  json.updated_at product.updated_at

  # 🔁 Variants
  json.variants product.variants do |v|
    json.id v.id
    json.variant_code v.variant_code
    json.color v.color
    json.price v.price
    json.compare_at_price v.compare_at_price
    json.variant_code v.variant_code
    json.stock v.stock
    json.sizes v.sizes.pluck(:label).uniq
    json.product_id v.product_id
    json.created_at v.created_at
    json.updated_at v.updated_at

    json.images v.images.map { |image|
      begin
        url_for(image.variant(resize_to_limit: [500, 500]))
      rescue => e
        Rails.logger.warn("Image processing error: #{e.message}")
        nil
      end
    }.compact.map { |path|
      "#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}#{path}"
    }

    # ✅ Variant avatar_url fallback
    avatar_path =
      if v.avatar.attached?
        begin
          url_for(v.avatar.variant(resize_to_limit: [500, 500]))
        rescue
          "/placeholder.svg?height=300&width=250"
        end
      else
        "/placeholder.svg?height=300&width=250"
      end

    json.avatar_url("#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}#{avatar_path}")
  end

  # ✅ Product main image (from product.image)
  image_path =
    if product.image.attached?
      begin
        url_for(product.image.variant(resize_to_limit: [500, 500]))
      rescue
        "/placeholder.svg?height=300&width=250"
      end
    else
      "/placeholder.svg?height=300&width=250"
    end

  # ✅ Hover image (from product.hover_image)
  hover_path =
    if product.hover_image.attached?
      begin
        url_for(product.hover_image.variant(resize_to_limit: [500, 500]))
      rescue
        "/placeholder.svg?height=300&width=250"
      end
    else
      "/placeholder.svg?height=300&width=250"
    end

  json.image_url("#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}#{image_path}")
  json.hover_image_url("#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}#{hover_path}")
end

# ✅ Meta block
json.meta do
  json.current_page @products.current_page
  json.total_pages @products.total_pages
  json.total_count @products.total_count
  json.per_page @products.limit_value
  json.filters_applied @filters_applied
end
