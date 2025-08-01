json.cart_id current_cart.id
json.guest_cart current_user.nil?

json.cart_items @cart_items, partial: 'api/cart_items/cart_item', as: :cart_item

json.meta do
  json.total_pages @cart_items.total_pages
  json.current_page @cart_items.current_page
  json.total_count @cart_items.total_count
end
