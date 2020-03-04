module CartsHelper

  def log_in_guest_cart(guest_cart)
    session[:guest_cart_id] = guest_cart.id
  end

  # Logs in the given cart
  def log_in_cart(cart)
    session[:cart_id] = cart.id
  end

  def current_cart

    if (guest_cart_id = session[:guest_cart_id]) #vào trang mà chưa đang nhập



      if (user_id = session[:user_id]) #sau khi đăng nhập
        # 1 có cả giỏ hàng và giỏ khách

        current_user.reload.cart.present? ? cart = current_user.reload.cart : cart = Cart.create(user_id: user_id) # nếu người dùng hiện tại đã có giỏ hàng thì lấy không thì tạo giỏ hàng mới
        guest_cart = GuestCart.find_by(id: guest_cart_id) #lấy giỏ khách vẫn còn trong session
        unless guest_cart.guest_cart_items.blank? # nếu giỏ khách không trống chèn tất cả mục trong giỏ khách vào giỏ
          guest_cart.guest_cart_items.each {
            |guest_cart_item|
            current_item = cart.cart_items.find_by(variant_id: guest_cart_item.variant_id)
            if current_item
              current_item.quantity += guest_cart_item.quantity.to_i
              current_item.save
            else
              CartItem.create(cart_id: cart.id,
                              product_id: guest_cart_item.product_id,
                              quantity: guest_cart_item.quantity,
                              variant_id: guest_cart_item.variant_id)
            end
          }
        end
        log_out_guest_cart #xóa sesion giỏ khách
        guest_cart.destroy #xóa giỏ khách
        log_in_cart cart #tạo session giỏ
        @cart = cart #tạo giỏ
      else
        # 2 không có giỏ hàng và có giỏ khách

        log_out_cart
        guest_cart = GuestCart.find_by(id: guest_cart_id)
        log_in_guest_cart guest_cart
        @guest_cart = guest_cart
      end


    else
      if (user_id = session[:user_id])
        # 3 có cả giỏ hàng và giỏ khách

        current_user.reload.cart.present? ? cart = current_user.reload.reload.cart : cart = Cart.create(user_id: user_id)
        log_in_cart cart
        @cart = cart
      else
        # 4 không có cả giỏ hàng và giỏ khách

        log_out_cart
        guest_cart = GuestCart.create
        log_in_guest_cart guest_cart
        @guest_cart = guest_cart
      end
    end
  end

end

def log_out_guest_cart
  session.delete(:guest_cart_id)
  @guest_cart = nil
end

# Logs out the current user.
def log_out_cart
  session.delete(:cart_id)
  @cart = nil
end


