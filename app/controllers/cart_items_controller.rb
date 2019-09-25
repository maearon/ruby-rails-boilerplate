class CartItemsController < ApplicationController
  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    set_cart.cart(@product, @variant, params[:cart_item][:quantity], params[:cart_item][:action])
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.js
    end
  end
end
