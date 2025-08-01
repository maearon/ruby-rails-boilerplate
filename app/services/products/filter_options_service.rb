# app/services/products/filter_options_service.rb

module Products
  class FilterOptionsService
    def initialize(products)
      @products = products
    end

    def call
      {
        gender: generic_counts(:gender),
        category: generic_counts(:category),
        activity: generic_counts(:activity),
        brand: generic_counts(:brand),
        sport: generic_counts(:sport),
        material: generic_counts(:material),
        colors: color_counts,
        sizes: size_counts,
        models: model_counts,
        collections: collection_counts,
        price_range: price_range
      }
    end

    private

    def generic_counts(field)
      @products
        .reorder(nil)
        .group(field)
        .count
        .map do |value, count|
          next if value.blank?
          { value: value, label: value.to_s.humanize, count: count }
        end
        .compact
    end

    def color_counts
      @products
        .joins(:variants)
        .pluck('variants.color')
        .compact
        .group_by(&:itself)
        .transform_values(&:count)
        .map { |color, count| { value: color, label: color, count: count } }
    end

    def size_counts
      size_labels = @products
                      .joins(variants: :sizes)
                      .pluck('sizes.label')
                      .compact

      size_labels
        .group_by(&:itself)
        .transform_values(&:count)
        .map { |label, count| { value: label, label: label, count: count } }
    end

    def model_counts
      @products
        .pluck(:model_number)
        .compact
        .group_by(&:itself)
        .transform_values(&:count)
        .map { |model, count| { value: model, label: model, count: count } }
    end

    def collection_counts
      @products
        .pluck(:collection)
        .compact
        .group_by(&:itself)
        .transform_values(&:count)
        .map { |c, count| { value: c, label: c, count: count } }
    end

    def price_range
      prices = @products
                 .joins(:variants)
                 .pluck('variants.price')
                 .compact

      {
        min: prices.min&.floor || 0,
        max: prices.max&.ceil || 500
      }
    end
  end
end
