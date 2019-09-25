class Admin::ProductsController < ApplicationController
  before_action :set_product, only: [:edit, :update, :destroy]

  def index
  end

  def new
    @product = Product.new
  end

  def edit
  end

  def show
    @variant = @product.variants.find(params[:variant])
  end

  def create
  end

  def update
  end

  def destroy
  end

  private
    def set_product
      @product = Product.find(params[:id])
    end

    def product_params
      # params.require(:product).permit(:name, :jan_code)
      params.require(:product).permit(:name, :jan_code, :gender_id, :age_id, :franchise_id, :producttype_id, :brand_id, :category_id, :sport_id,
                                      variants_attributes:
                                      [:id, :price, :originalprice, :sku, :stock, :color_id, :_destroy, :avatar, :hover, images: []])
    end
end
