class WishController < ApplicationController
  def index
    @wish_items = current_wish.list.order(:id).page(params[:page]).per_page(10)
  end
end
