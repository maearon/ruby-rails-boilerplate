class CartController < ApplicationController
  def index
    @cart_items = current_cart.list.order(:id).page(params[:page]).per_page(10)
  end
end
