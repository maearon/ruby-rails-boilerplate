class WishController < ApplicationController
  def index
    @wish_items = current_wish.list.paginate(page: params[:page])
  end
end
