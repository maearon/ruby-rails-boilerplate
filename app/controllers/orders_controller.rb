class OrdersController < ApplicationController
  def index
    @orders = Order.all
  end

  def show
    @order = Order.find(params[:id])
  end

  def new
    @order = Order.new
  end

  def edit
    @order = Order.find(params[:id])
  end

  def checkout1
  end

  def checkout2
  end

  def checkout3
  end

  def checkout4
    @order = Order.new
  end

  def checkout5
  end

  def addresses
  end

  def create
    # Generate order_items for a subset of vatiants (products) in current_cart (current_order).

    unless current_cart.list.blank? || current_user.blank?
      order = current_user.orders.create

      current_cart.list.each { |cart_item|
        order.order_items.create!(quantity: cart_item.quantity,
                                  order_id: order.id,product_id: cart_item.product_id ,variant_id: cart_item.variant_id)
      }

      if order.save
        redirect_to checkout5_path
      else
        redirect_to request.referrer
      end
    end

    # @product = Product.find(params[:product_id])
    # @variant = Variant.find(params[:variant_id])
    # current_cart.cart(@product, @variant, params[:cart_item][:quantity], params[:cart_item][:action])
    # respond_to do |format|
    #   format.html { redirect_to request.referrer }
    #   format.turbo_stream
    # end


    # def cart(product, variant, quantity, action)
    #   if current_item = cart_items.find_by(variant: variant)
    #     current_item.quantity ||= 1
    #     action == 'edit' ? current_item.quantity = quantity.to_i : current_item.quantity += quantity.to_i
    #     current_item.save
    #   else
    #     cart_items.create(product: product,variant: variant, cart: self, quantity: quantity)
    #   end
    # end



    # @order = Order.new(order_params)

    # if @order.save
    #   redirect_to orders_path
    # else
    #   redirect_to request.referrer
    # end
  end

  def update
    @order = Order.find(params[:id])

    if @order.update(order_params)
      redirect_to admin_orders_path
    else
      render 'edit'
    end
  end

  def destroy
    @order = Order.find(params[:id])
    @order.destroy

    redirect_to request.referrer
  end

  private
  def order_params
    params.require(:order).permit(:user_id, :address, :phone, :method, :status, :details)
  end
  def cart_params
    params.require(:cart).permit(:quantity, :cart_id, :product_id, :product_id, :variant_id)
  end
  def filtering_params(params)
    params.slice(:status, :location, :starts_with)
  end
end
