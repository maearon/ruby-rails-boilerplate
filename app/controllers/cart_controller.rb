class CartController < ApplicationController
  def index
    @cart_items = current_cart.list.paginate(page: params[:page])
  end
end
