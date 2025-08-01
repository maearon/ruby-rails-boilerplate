module Api
  class ProductsController < Api::ApiController
    before_action :authenticate!, except: %i[index show]
    before_action :set_product, only: %i[update destroy]

    PRODUCT_INCLUDES = {
      image_attachment: :blob,
      hover_image_attachment: :blob,
      variants: [
        :sizes,
        { images_attachments: :blob },
        { avatar_attachment: :blob }
      ]
    }.freeze

    # GET /api/products
    def index
      @products = Product.includes(PRODUCT_INCLUDES)
      @products = Products::FilterService.new(@products, params).apply
      @products = Products::SortService.new(@products, params[:sort]).call
      @products = @products.page(params[:page]).per(params[:per_page] || 20)

      # render json: {
      #   products: products,
      #   meta: Products::MetaService.new(products, params).call
      # }
    end

    # GET /api/products/:model_number
    def show
      raise ActiveRecord::RecordNotFound, "Missing variant_code" if params[:variant_code].blank?

      @variant = Variant.includes(:sizes, { images_attachments: :blob }, :product)
                         .find_by!(variant_code: params[:variant_code])

      # @product = Product.includes(variants: [:sizes, images_attachments: :blob])
      #                  .find_by!(model_number: params[:model_number])

      @product = @variant.product

      @related_products = Products::RelatedProductsService.new(@product).call

      # render json: {
      #   data: product,
      #   related_products: Products::RelatedProductsService.new(product).call,
      #   breadcrumb: Products::BreadcrumbService.new(params[:slug]).call
      # }
    end

    # GET /api/products/filters?slug=...
    def filters
      base_scope = Products::SlugFilterService.new(Product.includes(:variants), params[:slug]).call
      render json: Products::FilterOptionsService.new(base_scope).call
    end

    # POST /api/products
    def create
      product = Product.new(product_params)

      if product.save
        Rabbitmq::ProductEventPublisher.publish(product)
        response201(option_data: { data: product })
      else
        response422_with_error(product.errors.full_messages)
      end
    end

    # PUT /api/products/:id
    def update
      if @product.update(product_params)
        response200(option_data: { data: @product })
      else
        response422_with_error(@product.errors.full_messages)
      end
    end

    # DELETE /api/products/:id
    def destroy
      @product.destroy
      response200(option_data: { message: "Deleted successfully" })
    end

    private

    def set_product
      @product = Product.find_by!(model_number: params[:id])
    end

    def product_params
      params.require(:product).permit(
        :name, :description_h5, :description_p, :care, :specifications,
        :brand, :gender, :sport, :category, :product_type,
        :model_number, :franchise, :slug, :badge, :status, :is_featured,
        :model_base_id, :collaboration_id, tag_ids: []
      )
    end

    def set_cors_headers
      response.headers["Access-Control-Allow-Origin"] = "*"
      response.headers["Access-Control-Allow-Methods"] = "GET, POST, PUT, DELETE, OPTIONS"
      response.headers["Access-Control-Allow-Headers"] = "Content-Type, Authorization"
    end
  end
end
