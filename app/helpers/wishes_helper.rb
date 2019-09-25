module WishesHelper

  # Logs in the given wish
  def log_in_wish(wish)
    session[:wish_id] = wish.id
  end

  def set_wish
    if (wish_id = session[:wish_id])
      if (user_id = session[:user_id])
        if current_user.wish.present?
          wish = current_user.wish
        else
          wish = Wish.create(user_id: user_id)
        end
        current_wish = Wish.find_by(id: wish_id)
        unless current_wish.id == wish.id
          current_wish.wish_items.each {
            |wish_item|
            current_item = wish.wish_items.find_by(variant_id: wish_item.variant_id)
            if current_item
            else
              WishItem.create(wish_id: wish.id,
                              product_id: wish_item.product_id,
                              variant_id: wish_item.variant_id)
            end
          }
        end
        log_in_wish wish
        @wish = wish
      else
        wish = Wish.find_by(id: wish_id)
        log_in_wish wish
        @wish = wish
      end
    else
      if (user_id = session[:user_id])
        if current_user.wish.present?
          wish = current_user.wish
        else
          wish = Wish.create(user_id: user_id)
        end
        log_in_wish wish
        @wish = wish
      else
        wish = Wish.create
        log_in_wish wish
        @wish = wish
      end
    end
  end

end
