class GuestCartItemsController < ApplicationController
  before_action :set_guest_cart_item, only:[:destroy]

  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    current_cart.cart(@product, @variant, params[:guest_cart_item][:quantity], params[:guest_cart_item][:action])
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.js
    end
  end

  def destroy
    @guest_cart_item.destroy
    redirect_to request.referrer
  end

  private
    def set_guest_cart_item
      @guest_cart_item = GuestCartItem.find(params[:id])
    end
end
