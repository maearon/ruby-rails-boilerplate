class Api::V1::WishController < Api::V1::ApiController
  def index
    @totalwish = current_wish.total_item
    render json: @totalwish
  end
end
