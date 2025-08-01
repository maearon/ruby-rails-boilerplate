# frozen_string_literal: true

module Products
  class MetaService
    def initialize(scope, params)
      @scope = scope
      @params = params
    end

    def call
      {
        total_count: @scope.count,
        available_filters: available_filters
      }
    end

    private

    def available_filters
      {
        brands:     distinct_values_for(:brand),
        categories: distinct_values_for(:category),
        colors:     variant_colors,
        sizes:      variant_sizes
      }
    end

    def distinct_values_for(field)
      @scope.reorder(nil).distinct.pluck("products.#{field}").compact.uniq
    end

    def variant_colors
      @scope
        .joins(:variants)
        .reorder(nil)
        .distinct
        .pluck("variants.color")
        .compact
        .uniq
    end

    def variant_sizes
      @scope
        .joins(variants: :sizes)
        .reorder(nil)
        .pluck("sizes.label")
        .compact
        .uniq
    end
  end
end
