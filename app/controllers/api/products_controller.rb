class Api::ProductsController < Api::ApiController
  before_action :authenticate!, except: %i[index show]
  before_action :set_product, only: %i[show update destroy]

  def index
    query = params[:q].present? ? { name_cont: params[:q] } : {}
    @products = Product.ransack(query).result(distinct: true).page(params[:page])
  end

  def show
    render json: @product
  end

  def create
    @product = Product.new(product_params)
    if @product.save
      render json: @product, status: :created
    else
      response422_with_error(@product.errors.messages)
    end
  end

  def update
    if @product.update(product_params)
      render json: @product, status: :ok
    else
      response422_with_error(@product.errors.messages)
    end
  end

  def destroy
    @product.destroy
    response200
  end

  private

  def set_product
    @product = Product.find(params[:id])
  end

  def product_params
    params.require(:product).permit(:name, :description, :price, :stock, :category_id)
  end
end
