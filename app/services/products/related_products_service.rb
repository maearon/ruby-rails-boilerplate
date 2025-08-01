module Products
  class RelatedProductsService
    def initialize(product)
      @product = product
    end

    def call
      related = Product.where.not(id: @product.id)
                      .where(gender: @product.gender, category: @product.category, sport: @product.sport)
                      .includes(:variants, :reviews, image_attachment: :blob)
                      .limit(4)

      return related if related.size >= 4

      fallback = Product.where.not(id: @product.id)
                        .where(category: @product.category)
                        .includes(:variants, :reviews)
                        .limit(4 - related.size)

      related + fallback
    end

  end
end
