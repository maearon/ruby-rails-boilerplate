# app/services/products/breadcrumb_service.rb

module Products
  class BreadcrumbService
    def initialize(slug)
      @slug = slug.to_s.strip
    end

    def call
      return "Home" if @slug.blank?

      PREDEFINED_BREADCRUMBS.fetch(@slug, generate_fallback_breadcrumb)
    end

    private

    PREDEFINED_BREADCRUMBS = {
      'men-soccer-shoes'      => "Home / Men / Soccer / Shoes",
      'women-running-shoes'   => "Home / Women / Running / Shoes",
      'men-tops'              => "Home / Men / Apparel / Tops",
      'women-tops'            => "Home / Women / Apparel / Tops",
      'kids-running-cleats'   => "Home / Kids / Running / Cleats"
    }.freeze

    def generate_fallback_breadcrumb
      segments = @slug.split('-').map(&:capitalize)
      "Home / #{segments.join(' / ')}"
    end
  end
end
