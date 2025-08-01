class Api::CartItemsController < Api::ApiController
  before_action :set_cart_item, only:[:destroy, :update]

  def create
    @product = Product.find(params[:product_id])
    @variant = Variant.find(params[:variant_id])
    current_cart.cart(@product, @variant, params[:cart_item][:quantity], params[:cart_item][:action])
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.turbo_stream
    end
  end

  def update
    if @cart_item.quantity .between? 2, 14
      @cart_item.update_attribute(:quantity,@cart_item.quantity+=1) if params[:inc] == "inc"
      @cart_item.update_attribute(:quantity,@cart_item.quantity-=1) if params[:dec] == "dec"
    end
    if @cart_item.quantity == 15
      @cart_item.update_attribute(:quantity,@cart_item.quantity) if params[:inc] == "inc"
      @cart_item.update_attribute(:quantity,@cart_item.quantity-=1) if params[:dec] == "dec"
    end
    if @cart_item.quantity == 1
      @cart_item.update_attribute(:quantity,@cart_item.quantity+=1) if params[:inc] == "inc"
      @cart_item.update_attribute(:quantity,@cart_item.quantity) if params[:dec] == "dec"
    end
    respond_to do |format|
      format.html { redirect_to request.referrer }
      format.turbo_stream
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
