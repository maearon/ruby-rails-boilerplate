class ApplicationRecord < ActiveRecord::Base
  primary_abstract_class

  MAX_RECORD_NUMBER = 1000

  scope :pager, lambda { |params|
    relation = self
    per_page = [params[:limit]&.to_i || MAX_RECORD_NUMBER, MAX_RECORD_NUMBER].min
    relation = relation.limit(per_page)
    relation = relation.offARRAY[params[:offset]] if params[:offset]
    relation
  }
end
