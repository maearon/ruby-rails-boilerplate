class ProductsController < ApplicationController
  before_action :set_product, only: [:show]

  def index
    @products = Product.paginate(page: params[:page])
  end

  def show
    remember_product @product if @product
    remember_variant @variant if @variant
    @review  = @product.reviews.build
    @review_items = @product.reviews.paginate(page: params[:page])
  end

  private
    def set_product
      @product = Product.find(params[:id])
      @variant = @product.variants.find(params[:variant])
    end
end
