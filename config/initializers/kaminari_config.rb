# frozen_string_literal: true

Kaminari.configure do |config|
  config.default_per_page = 5
  # config.default_per_page = 25
  # config.max_per_page = nil
  # config.window = 4
  # config.outer_window = 0
  # config.left = 0
  # config.right = 0
  # config.page_method_name = :page
  # config.param_name = :page
  # config.max_pages = nil
  # config.params_on_first_page = false
end

# These two are needed to make will_paginate work with AA.
# require 'will_paginate/active_record'
# module WillPaginate
#   module ActiveRecord
#     module RelationMethods
#       alias_method :total_count, :count
#     end
#   end
# end
