# lib/tasks/reindex_products.rake
namespace :products do
  desc "Reindex all products into Elasticsearch"
  task reindex: :environment do
    Product.find_each do |product|
      Rabbitmq::ProductEventPublisher.publish(product)
    end
  end
end
