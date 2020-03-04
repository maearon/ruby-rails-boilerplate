module WishesHelper

  def log_in_guest_wish(guest_wish)
    session[:guest_wish_id] = guest_wish.id
  end

  # Logs in the given wish
  def log_in_wish(wish)
    session[:wish_id] = wish.id
  end

  def current_wish

    if (guest_wish_id = session[:guest_wish_id])
      if (user_id = session[:user_id])
        # 1
        current_user.reload.wish.present? ? wish = current_user.reload.wish : wish = Wish.create(user_id: user_id)
        guest_wish = GuestWish.find_by(id: guest_wish_id)
        unless guest_wish.guest_wish_items.blank?
          guest_wish.guest_wish_items.each {
            |guest_wish_item|
            current_item = wish.wish_items.find_by(variant_id: guest_wish_item.variant_id)
            WishItem.create(wish_id: wish.id,
                            product_id: guest_wish_item.product_id,
                            variant_id: guest_wish_item.variant_id) unless current_item
          }
        end
        log_out_guest_wish
        guest_wish.destroy
        log_in_wish wish
        @wish = wish
      else
        # 2
        log_out_wish
        guest_wish = GuestWish.find_by(id: guest_wish_id)
        log_in_guest_wish guest_wish
        @guest_wish = guest_wish
      end
    else
      if (user_id = session[:user_id])
        # 3
        current_user.reload.wish.present? ? wish = current_user.reload.wish : wish = Wish.create(user_id: user_id)
        log_in_wish wish
        @wish = wish
      else
        # 4
        log_out_wish
        guest_wish = GuestWish.create
        log_in_guest_wish guest_wish
        @guest_wish = guest_wish
      end
    end
  end

end

def log_out_guest_wish
  session.delete(:guest_wish_id)
  @guest_wish = nil
end

# Logs out the current user.
def log_out_wish
  session.delete(:wish_id)
  @wish = nil
end
