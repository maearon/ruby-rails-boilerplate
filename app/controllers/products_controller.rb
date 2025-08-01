# app/controllers/api/products_controller.rb
module Api
  class ProductsController < Api::ApiController
    include ResponsesHandler

    before_action :authenticate!, except: %i[index show filters]
    before_action :set_product, only: %i[update destroy]
    before_action :set_cors_headers

    PRODUCT_INCLUDES = {
      image_attachment: :blob,
      hover_image_attachment: :blob,
      variants: [
        :sizes,
        { images_attachments: :blob },
        { avatar_attachment: :blob }
      ]
    }.freeze

    def index
      base_scope = Product.includes(PRODUCT_INCLUDES)
      filtered   = Products::FilterService.new(base_scope, params).apply
      sorted     = Products::SortService.new(filtered, params[:sort]).call
      @products  = sorted.page(params[:page]).per(params[:per_page] || 20)
      @meta      = Products::MetaService.new(@products, params).call

      render :index
    end

    def show
      product    = Product.includes(variants: [:sizes, images_attachments: :blob])
                          .find_by!(model_number: params[:model_number])
      related    = Products::RelatedProductsService.new(product).call
      breadcrumb = Products::BreadcrumbService.new(params[:slug]).call

      render json: {
        data: product,
        related_products: related,
        breadcrumb: breadcrumb
      }
    end

    def filters
      base_scope = Product.includes(:variants)
      filtered   = Products::FilterService.new(base_scope, params).apply_slug_only
      filters    = Products::FilterOptionsService.new(filtered).call

      render json: filters
    end

    def create
      product = Product.new(product_params)

      if product.save
        Rabbitmq::ProductEventPublisher.publish(product)
        response201(option_data: { data: product })
      else
        response422_with_error(product.errors.full_messages)
      end
    end

    def update
      if @product.update(product_params)
        response200(option_data: { data: @product })
      else
        response422_with_error(@product.errors.full_messages)
      end
    end

    def destroy
      @product.destroy
      response200(option_data: { message: 'Deleted successfully' })
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
      response.headers['Access-Control-Allow-Origin'] = '*'
      response.headers['Access-Control-Allow-Methods'] = 'GET, POST, PUT, DELETE, OPTIONS'
      response.headers['Access-Control-Allow-Headers'] = 'Content-Type, Authorization'
    end
  end
end
