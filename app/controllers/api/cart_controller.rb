class Api::CartController < Api::ApiController
  before_action :authenticate!, except: %i[index show]
  def index
    @cart_items = current_cart.list.order(:id).page(params[:page]).per(10)
  end
end
