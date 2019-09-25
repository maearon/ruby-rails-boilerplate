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
    @product = Product.new(product_params)

    respond_to do |format|
      if @product.save
        format.html { redirect_to admin_products_url, notice: t("flash.create", name: "商品") }
      else
        format.html { render :new }
      end
    end
  end

  def update
    respond_to do |format|
      if @product.update(product_params)
        format.html { redirect_to admin_products_url, notice: t("flash.update", name: "商品") }
      else
        format.html { render :edit }
      end
    end
  end

  def destroy
    @product.destroy
    respond_to do |format|
      format.html { redirect_to admin_products_url, notice: t("flash.destroy", name: "商品") }
    end
  end

  def import; end

  def csv_import
    if params[:file].present? && params[:file].original_filename &&
        File.extname(params[:file].original_filename) == ".csv"
      import = Product.import params[:file]
      redirect_to import_admin_products_url
      unless import
        flash[:alert] = t("flash.csv_format_incorrect")
      else
        flash[:notice] = [import.values.first, import.values.second]
        flash[:alert] = import.values.reject{|value| value.in? [import.values.first, import.values.second]}
      end
    else
      redirect_to import_admin_products_url, alert: t("flash.csv_not_found")
    end
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

#bin/rails generate model Product productname:text productimagepath:text
#gender_id:text age_id:text price:integer originalpride:integer color_id:text
#colordetail:text franchise_id:text producttype_id:text brand_id:text
#category_id:text sport_id:text productdetailspath:text
# bin/rails generate model Gender gender_id:text gender_name:text --no-timestamps
# bin/rails generate model Age age_id:text age_name:text --no-timestamps
# bin/rails generate model Franchise franchise_id:text franchise_name:text --no-timestamps
# bin/rails generate model Producttype producttype_id:text producttype_name:text --no-timestamps
#bin/rails generate model Brand brand_id:text brand_name:text --no-timestamps
# bin/rails generate model Category category_id:text category_name:text --no-timestamps
# bin/rails generate model Sport sport_id:text sport_name:text --no-timestamps
