module CartsHelper

  # Logs in the given cart
  def log_in_cart(cart)
    session[:cart_id] = cart.id
  end

  def set_cart

    if (cart_id = session[:cart_id])
      if (user_id = session[:user_id])
        # 1
        if current_user.cart.present?
          cart = current_user.cart
        else
          cart = Cart.create(user_id: user_id)
        end
        current_cart = Cart.find_by(id: cart_id)
        unless current_cart.id == cart.id
          current_cart.cart_items.each {
            |cart_item|
            current_item = cart.cart_items.find_by(variant_id: cart_item.variant_id)
            if current_item
              current_item.quantity += cart_item.quantity.to_i
              current_item.save
            else
              CartItem.create(cart_id: cart.id,
                              product_id: cart_item.product_id,
                              quantity: cart_item.quantity,
                              variant_id: cart_item.variant_id)
            end
          }
        end
        log_in_cart cart
        @cart = cart
      else
        # 2
        cart = Cart.find_by(id: cart_id)
        log_in_cart cart
        @cart = cart
      end
    else
      if (user_id = session[:user_id])
        # 3
        if current_user.cart.present?
          cart = current_user.cart
        else
          cart = Cart.create(user_id: user_id)
        end
        log_in_cart cart
        @cart = cart
      else
        # 4
        cart = Cart.create
        log_in_cart cart
        @cart = cart
      end
    end
  end

end
