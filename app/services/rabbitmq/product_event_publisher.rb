require 'bunny'

module Rabbitmq
  class ProductEventPublisher
    def self.publish(product)
      connection = Bunny.new(hostname: ENV.fetch("RABBITMQ_HOST", "localhost"))
      connection.start

      channel = connection.create_channel
      exchange = channel.topic("product_events", durable: true)

      payload = {
        event: "product.created",
        data: {
          id: product.id,
          name: product.name,
          gender: product.gender,
          franchise: product.franchise,
          product_type: product.product_type,
          brand: product.brand,
          category: product.category,
          sport: product.sport,
          description_h5: product.description_h5,
          description_p: product.description_p,
          specifications: product.specifications,
          care: product.care,
          created_at: product.created_at,
          updated_at: product.updated_at,
          variants: product.variants.map do |variant|
            {
              id: variant.id,
              color: variant.color,
              price: variant.price,
              compare_at_price: variant.compare_at_price,
              variant_code: variant.variant_code,
              stock: variant.stock,
              product_id: variant.product_id,
              created_at: variant.created_at,
              updated_at: variant.updated_at
            }
          end
        }
      }

      exchange.publish(
        payload.to_json,
        routing_key: "product.created",
        content_type: "application/json"
      )

      puts "📤 Published product.created event for product ##{product.id}"
      connection.close
    end
  end
end
