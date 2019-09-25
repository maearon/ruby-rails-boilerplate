class Api::V1::ProductsController < Api::V1::ApiController
  def index
    @products = Product.ransack(name_cont: params[:q]).result(distinct: true)
    # if params[:q].present?
  end
end
