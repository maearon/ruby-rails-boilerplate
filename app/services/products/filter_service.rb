module Products
  class FilterService
    attr_reader :scope, :params

    def initialize(scope, params)
      @scope = scope
      @params = params
    end

    def apply
      parsed_filters = slug_filters.merge(standard_filters)

      parsed_filters.each do |field, values|
        next if values.blank?

        if %i[material collection model_number].include?(field)
          apply_like_filter(field, values)
        elsif %i[color size].include?(field)
          apply_variant_filter(field, values)
        else
          apply_exact_filter(field, values)
        end
      end

      apply_price_shipping
      @scope.distinct
    end

    def apply_slug_only
      filters = slug_filters
      filters.each do |field, values|
        apply_exact_filter(field, values)
      end
      @scope
    end

    def self.build_applied_filters(params)
      filters = {}
      %i[gender category activity brand sport material color size model collection sort min_price max_price shipping].each do |key|
        next unless params[key].present?
        filters[key] = key == :sort ? params[key] : params[key].split(',')
      end
      filters
    end

    private

    # === Slug parsing
    def slug_filters
      return {} unless params[:slug].present?

      Products::SlugParserService.new(params[:slug]).call.transform_values do |v|
        [v.downcase]
      end
    end

    # === Standard filters (params like ?gender=men,women)
    def standard_filters
      {
        gender: :gender,
        category: :category,
        activity: :activity,
        brand: :brand,
        sport: :sport,
        product_type: :product_type,
        material: :material,
        collection: :collection,
        model_number: :model, # special key
        color: :color,
        size: :size
      }.each_with_object({}) do |(field, param_key), result|
        next unless params[param_key].present?

        values = params[param_key].split(',').map(&:downcase)
        result[field] = values
      end
    end

    # === Filtering methods
    def apply_exact_filter(field, values)
      @scope = @scope.where("LOWER(#{field}) IN (?)", values)
    end

    def apply_like_filter(field, values)
      @scope = @scope.where("LOWER(#{field}) ILIKE ANY (ARRAY[?])", values.map { |v| "%#{v}%" })
    end

    def apply_variant_filter(field, values)
      case field
      when :color
        @scope = @scope.joins(:variants).where("LOWER(variants.color) ILIKE ANY (ARRAY[?])", values.map { |v| "%#{v}%" })
      when :size
        @scope = @scope.joins(variants: :sizes).where("LOWER(sizes.label) ILIKE ANY (ARRAY[?])", values.map { |v| "%#{v}%" })
      end
    end

    def apply_price_shipping
      if params[:min_price].present?
        @scope = @scope.joins(:variants).where("variants.price >= ?", params[:min_price].to_f)
      end

      if params[:max_price].present?
        @scope = @scope.joins(:variants).where("variants.price <= ?", params[:max_price].to_f)
      end

      if params[:shipping].to_s.downcase.include?("prime")
        @scope = @scope.where(prime_shipping: true)
      end
    end
  end
end
