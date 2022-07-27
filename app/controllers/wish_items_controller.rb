class WishItemsController < ApplicationController
  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    current_wish.wish(@product, @variant)
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.turbo_stream
    end
  end

  def destroy
    @current_item = WishItem.find(params[:id])
    @product = @current_item.product
    @variant = @current_item.variant
    current_wish.unwish(@current_item)
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.turbo_stream
    end
  end
end
