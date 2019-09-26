class Admin::ProductsController < ApplicationController
  before_action :set_product
  def index
  end

  def new
    @variants = @product.variants.build
  end

  def edit
    @variants = @product.variants || @product.build_variants
  end

  def create
    @product = Product.new(product_params)
    1.times { @product.variants.build }

    if @product.save
      redirect_to request.referrer
    else
      render 'new'
    end
  end

  def update
    if @product.update(product_params)
      redirect_to request.referrer
    else
      render 'edit'
    end
  end

  def destroy
    @product.destroy

    respond_to do |format|
      format.html {
        flash[:success] = 'Product successfully deleted!'
        redirect_to admin_products_path
      }
      format.js
    end
  end

  private
  def set_product
    @product = Product.find_by(id: params[:id])
    @product ? nil : @product = Product.new
  end

  def product_params
    params.require(:product).permit(:name, :jan_code, :gender, :age, :franchise, :producttype, :brand, :category, :sport,
                                      variants_attributes: [:id, :price, :originalprice, :sku, :stock, :color, :avatar, :hover, :_destroy, images: []])
  end
end
