json.products do
  json.array!(@products) do |product|
    json.id product.id
    json.sku 12064273040195392
    json.title product.name
    json.description product.description_p

    json.availableSizes ["M"]

    json.style product.category
    json.price product.variants.first.price
    json.installments product.variants.first.stock
    json.currencyId flash_classss(locale.to_s)
    json.currencyFormat I18n.translate('number.currency.format.unit', locale: locale.to_s )
    json.isFreeShipping true

    json.image_url "#{request.env['rack.url_scheme']}://#{request.env['HTTP_HOST']}"+url_for(product.variants.first.avatar)

  end
end

# json.gender product.gender
#     json.franchise product.franchise
#     json.producttype product.producttype
#     json.category product.category
#     json.sport product.sport
#     json.description_h5 product.description_h5
#     json.description_p product.description_p
#     json.specifications product.specifications
#     json.care product.care
#     json.image_url url_for(product.variants.first.images.first)
#     json.url url_for(admin_product_path(product))
#     json.url_edit url_for(edit_admin_product_path(product))
# json.image_url "#{request.env['rack.url_scheme']}://#{request.host}:#{request.env['SERVER_PORT']}"+url_for(product.variants.first.avatar)
