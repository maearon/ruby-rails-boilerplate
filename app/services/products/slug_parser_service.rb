# app/services/products/slug_parser_service.rb
module Products
  class SlugParserService
    def initialize(slug)
      @slug = slug.to_s.downcase
    end

    def call
      return {} if @slug.blank?

      tokens = @slug.split('-')
      result = {}

      tokens.each do |token|
        field = Product::FIELD_DICTIONARY[token]
        next if field.nil?

        result[field] ||= token # Ưu tiên giữ giá trị đầu tiên nếu có nhiều token trùng field
      end

      result
    end
  end
end
