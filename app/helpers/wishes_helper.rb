module WishesHelper
  def log_in_guest_wish(guest_wish)
    session[:guest_wish_id] = guest_wish.id if guest_wish
  end

  def log_in_wish(wish)
    session[:wish_id] = wish.id if wish
  end

  def log_out_guest_wish
    session.delete(:guest_wish_id)
    @guest_wish = nil
  end

  def log_out_wish
    session.delete(:wish_id)
    @wish = nil
  end

  def current_wish
    if (guest_wish_id = session[:guest_wish_id])
      if (user_id = session[:user_id])
        wish = current_user.reload.wish || Wish.create(user_id: user_id)
        guest_wish = GuestWish.find_by(id: guest_wish_id)
        
        if guest_wish && guest_wish.guest_wish_items.present?
          guest_wish.guest_wish_items.each do |guest_wish_item|
            current_item = wish.wish_items.find_by(variant_id: guest_wish_item.variant_id)
            WishItem.create(wish_id: wish.id,
                            product_id: guest_wish_item.product_id,
                            variant_id: guest_wish_item.variant_id) unless current_item
          end
        end

        log_out_guest_wish
        guest_wish&.destroy
        log_in_wish(wish)
        @wish = wish
      else
        log_out_wish
        guest_wish = GuestWish.find_by(id: guest_wish_id) || GuestWish.create
        log_in_guest_wish(guest_wish) if guest_wish
        @guest_wish = guest_wish
      end
    else
      if (user_id = session[:user_id])
        wish = current_user.reload.wish || Wish.create(user_id: user_id)
        log_in_wish(wish)
        @wish = wish
      else
        log_out_wish
        guest_wish = GuestWish.create
        log_in_guest_wish(guest_wish)
        @guest_wish = guest_wish
      end
    end

    @wish || @guest_wish
  end
end
