class GuestCartItemsController < ApplicationController
  before_action :set_guest_cart_item, only:[:destroy, :update]

  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    current_cart.cart(@product, @variant, params[:guest_cart_item][:quantity], params[:guest_cart_item][:action])
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.turbo_stream
    end
  end

  def update
    if @guest_cart_item.quantity .between? 2, 14
      @guest_cart_item.update_attribute(:quantity,@guest_cart_item.quantity+=1) if params[:inc] == "inc"
      @guest_cart_item.update_attribute(:quantity,@guest_cart_item.quantity-=1) if params[:dec] == "dec"
    end
    if @guest_cart_item.quantity == 15
      @guest_cart_item.update_attribute(:quantity,@guest_cart_item.quantity) if params[:inc] == "inc"
      @guest_cart_item.update_attribute(:quantity,@guest_cart_item.quantity-=1) if params[:dec] == "dec"
    end
    if @guest_cart_item.quantity == 1
      @guest_cart_item.update_attribute(:quantity,@guest_cart_item.quantity+=1) if params[:inc] == "inc"
      @guest_cart_item.update_attribute(:quantity,@guest_cart_item.quantity) if params[:dec] == "dec"
    end
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.turbo_stream
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
