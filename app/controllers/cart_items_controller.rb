class CartItemsController < ApplicationController
  before_action :set_cart_item, only:[:destroy]

  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    current_cart.cart(@product, @variant, params[:cart_item][:quantity], params[:cart_item][:action])
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.js
    end
  end

  def destroy
    @cart_item.destroy
    redirect_to request.referrer
  end

  private
    def set_cart_item
      @cart_item = CartItem.find(params[:id])
    end
end
