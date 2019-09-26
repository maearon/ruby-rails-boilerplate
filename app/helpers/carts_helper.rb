module CartsHelper

  def log_in_guest_cart(guest_cart)
    session[:guest_cart_id] = guest_cart.id
  end

  # Logs in the given cart
  def log_in_cart(cart)
    session[:cart_id] = cart.id
  end

  def current_cart

    if (guest_cart_id = session[:guest_cart_id])
      if (user_id = session[:user_id])
        # 1
        current_user.cart.present? ? cart = current_user.cart : cart = Cart.create(user_id: user_id)
        guest_cart = GuestCart.find_by(id: guest_cart_id)
        unless guest_cart.guest_cart_items.blank?
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
        log_out_guest_cart
        guest_cart.destroy
        log_in_cart cart
        @cart = cart
      else
        # 2
        log_out_cart
        guest_cart = GuestCart.find_by(id: guest_cart_id)
        log_in_guest_cart guest_cart
        @guest_cart = guest_cart
      end
    else
      if (user_id = session[:user_id])
        # 3
        current_user.cart.present? ? cart = current_user.cart : cart = Cart.create(user_id: user_id)
        log_in_cart cart
        @cart = cart
      else
        # 4
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


