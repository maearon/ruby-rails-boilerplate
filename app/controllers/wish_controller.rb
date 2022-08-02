class WishController < ApplicationController
  def index
    @wish_items = current_wish.list.order(:id).page(params[:page]).per(10)
  end
end
