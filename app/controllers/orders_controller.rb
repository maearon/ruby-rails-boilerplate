class OrdersController < ApplicationController
  def index
    @orders = Order.all
  end

  def show
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


    order = current_user.order.create

    current_cart.list.each { |order_item|
      order_items.create!(order_item)
    }

    if order.list == current_cart.list
      redirect_to orders_path
    else
      redirect_to request.referrer
    end

    # @product = Product.find(params[:product_id])
    # @variant = Variant.find(params[:variant_id])
    # current_cart.cart(@product, @variant, params[:cart_item][:quantity], params[:cart_item][:action])
    # respond_to do |format|
    #   format.html { redirect_to request.referrer }
    #   format.js
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
  def filtering_params(params)
    params.slice(:status, :location, :starts_with)
  end
end
