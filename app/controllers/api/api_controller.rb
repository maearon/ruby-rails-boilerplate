class Api::ApiController < ActionController::API
  include LocaleHelper
  helper_method :currency_code
  helper_method :current_user
  helper_method :current_cart
  helper_method :current_wish
  include ResponsesHandler
  include ErrorsHandler
  include ActionController::RequestForgeryProtection

  protect_from_forgery with: :exception
  
  skip_before_action :verify_authenticity_token

  private

  def pager(records)
    [records.size, records.pager(params)]
  end

  def error_message(error_message_key, options = nil)
    options.nil? ? I18n.t(error_message_key, scope: %i[errors messages]) : I18n.t(error_message_key, scope: %i[errors messages], **options)
  end

  def authenticate!
    response401_with_error(error_message(:not_logged_in)) unless logged_in?
  end

  def logged_in?
    !!current_user
  end

  def current_user
    user_id = Jwt::User::DecodeTokenService.call(request.headers['Authorization'])
    User.find_by(id: user_id) if user_id
    # return @current_user if defined?(@current_user)

    # token = request.headers['Authorization']
    # return nil unless token.present?

    # begin
    #   response = Faraday.get("http://localhost:9000/api/sessions") do |req|
    #     req.headers['Authorization'] = token
    #     req.headers['Content-Type'] = 'application/json'
    #   end

    #   return @current_user = nil unless response.success?

    #   json = JSON.parse(response.body)
    #   @current_user = OpenStruct.new(
    #     id: json['id'],
    #     email: json['email'],
    #     name: json['name'],
    #     admin: json['admin']
    #   )
    # rescue Faraday::Error => e
    #   Rails.logger.error("Auth Service error: #{e.message}")
    #   @current_user = nil
    # end
  end


  def current_cart
    if current_user
      # Logged-in user
      # cart = current_user.reload.cart || Cart.create(user_id: current_user.id)
      cart = Cart.find_by(user_id: current_user.id) || Cart.create(user_id: current_user.id)

      if params[:guest_cart_id].present?
        guest_cart = GuestCart.find_by(id: params[:guest_cart_id])
        
        if guest_cart && guest_cart.guest_cart_items.present?
          guest_cart.guest_cart_items.each do |guest_cart_item|
            existing_item = cart.cart_items.find_by(variant_id: guest_cart_item.variant_id)
            if existing_item
              existing_item.quantity += guest_cart_item.quantity.to_i
              existing_item.save
            else
              cart.cart_items.create!(
                product_id: guest_cart_item.product_id,
                quantity: guest_cart_item.quantity,
                variant_id: guest_cart_item.variant_id
              )
            end
          end
          guest_cart.destroy
        end
      end

      cart
    else
      # Guest user
      guest_cart = if params[:guest_cart_id].present?
                    GuestCart.find_by(id: params[:guest_cart_id])
                  else
                    GuestCart.create
                  end

      # Gợi ý: trả về cả guest_cart_id để frontend lưu
      guest_cart
    end
  end

  def current_wish
    if current_user
      # Logged-in user
      # wish = current_user.reload.wish || Wish.create(user_id: current_user.id)
      wish = Wish.find_by(user_id: current_user.id) || Wish.create(user_id: current_user.id)

      if params[:guest_wish_id].present?
        guest_wish = GuestWish.find_by(id: params[:guest_wish_id])

        if guest_wish&.guest_wish_items&.present?
          guest_wish.guest_wish_items.each do |guest_wish_item|
            existing_item = wish.wish_items.find_by(variant_id: guest_wish_item.variant_id)
            unless existing_item
              wish.wish_items.create!(
                product_id: guest_wish_item.product_id,
                variant_id: guest_wish_item.variant_id
              )
            end
          end
          guest_wish.destroy
        end
      end

      wish
    else
      # Guest user
      guest_wish = if params[:guest_wish_id].present?
                    GuestWish.find_by(id: params[:guest_wish_id])
                  else
                    GuestWish.create
                  end

      # Gợi ý: frontend lưu guest_wish_id sau khi nhận từ đây
      guest_wish
    end
  end

  def current_user_token
    request.headers['Authorization']&.split[1]
  end
end
