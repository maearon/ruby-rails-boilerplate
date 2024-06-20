module CartsHelper
  def log_in_guest_cart(guest_cart)
    session[:guest_cart_id] = guest_cart.id if guest_cart
  end

  def log_in_cart(cart)
    session[:cart_id] = cart.id if cart
  end

  def log_out_guest_cart
    session.delete(:guest_cart_id)
    @guest_cart = nil
  end

  def log_out_cart
    session.delete(:cart_id)
    @cart = nil
  end

  def current_cart
    if (guest_cart_id = session[:guest_cart_id])
      if (user_id = session[:user_id])
        cart = current_user.reload.cart || Cart.create(user_id: user_id)
        guest_cart = GuestCart.find_by(id: guest_cart_id)
        
        if guest_cart && guest_cart.guest_cart_items.present?
          guest_cart.guest_cart_items.each do |guest_cart_item|
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
          end
        end
        
        log_out_guest_cart
        guest_cart&.destroy
        log_in_cart(cart)
        @cart = cart
      else
        log_out_cart
        guest_cart = GuestCart.find_by(id: guest_cart_id) || GuestCart.create
        log_in_guest_cart(guest_cart) if guest_cart
        @guest_cart = guest_cart
      end
    else
      if (user_id = session[:user_id])
        cart = current_user.reload.cart || Cart.create(user_id: user_id)
        log_in_cart(cart)
        @cart = cart
      else
        log_out_cart
        guest_cart = GuestCart.create
        log_in_guest_cart(guest_cart)
        @guest_cart = guest_cart
      end
    end

    @cart || @guest_cart
  end
end
