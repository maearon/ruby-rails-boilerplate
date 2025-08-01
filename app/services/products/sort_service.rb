module Products
  class SortService
    SORT_MAP = {
      'PRICE (LOW - HIGH)' => ->(scope) { scope.order(price: :asc) },
      'PRICE (HIGH - LOW)' => ->(scope) { scope.order(price: :desc) },
      'NEWEST'             => ->(scope) { scope.order(created_at: :desc) },
      'TOP SELLERS'        => lambda do |scope|
        scope
          .left_joins(:reviews)
          .group('products.id')
          .order(Arel.sql('COUNT(reviews.id) DESC, COALESCE(AVG(reviews.rating), 0) DESC'))
      end,
      'DEFAULT'            => ->(scope) { scope.order(:name) }
    }.freeze

    def initialize(scope, sort_param)
      @scope = scope
      @sort_param = sort_param.to_s.upcase
    end

    def call
      (SORT_MAP[@sort_param] || SORT_MAP['DEFAULT']).call(@scope)
    end
  end
end
