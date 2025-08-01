json.id          cart_item.id
json.cart_id     cart_item.cart_id
json.product_id  cart_item.product_id
json.variant_id  cart_item.variant_id
json.quantity    cart_item.quantity

json.product do
  json.id              cart_item.product.id
  json.name            cart_item.product.name
  json.jan_code        cart_item.product.jan_code
  json.gender          cart_item.product.gender
  json.franchise       cart_item.product.franchise
  json.producttype     cart_item.product.producttype
  json.brand           cart_item.product.brand
  json.category        cart_item.product.category
  json.sport           cart_item.product.sport
  json.description_h5  cart_item.product.description_h5
  json.description_p   cart_item.product.description_p
  json.specifications  cart_item.product.specifications
  json.care            cart_item.product.care
  json.created_at      cart_item.product.created_at
  json.updated_at      cart_item.product.updated_at
end

json.variant do
  json.id             cart_item.variant.id
  json.color          cart_item.variant.color
  json.price          cart_item.variant.price
  json.originalprice  cart_item.variant.originalprice
  json.variant_code            cart_item.variant.variant_code
  json.stock          cart_item.variant.stock
  json.product_id     cart_item.variant.product_id
  json.images cart_item.variant.images.map { |image|
    if image.attached?
      "#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}#{url_for(image.variant(:display))}"
    end
  }.compact
  json.created_at     cart_item.variant.created_at
  json.updated_at     cart_item.variant.updated_at
end

json.size    cart_item.size
