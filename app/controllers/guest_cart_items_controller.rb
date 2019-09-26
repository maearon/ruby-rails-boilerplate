class GuestCartItemsController < ApplicationController
  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    current_cart.cart(@product, @variant, params[:guest_cart_item][:quantity], params[:guest_cart_item][:action])
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.js
    end
  end
end
