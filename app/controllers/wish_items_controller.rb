class WishItemsController < ApplicationController
  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    set_wish.wish(@product, @variant)
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.js
    end
  end

  def destroy
    @current_item = WishItem.find(params[:id])
    set_wish.unwish(@current_item)
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.js
    end
  end
end
