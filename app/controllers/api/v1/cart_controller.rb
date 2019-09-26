class Api::V1::CartController < Api::V1::ApiController
  def index
    @totalcart = current_cart.total_item
    render json: @totalcart
  end
end
