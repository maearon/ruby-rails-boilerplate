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
    json.currencyId currency_code(locale.to_s)
    json.currencyFormat I18n.translate('number.currency.format.unit', locale: locale.to_s )
    json.isFreeShipping true
    json.image_url "#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}"+url_for(product.variants.first.avatar)

  end
end