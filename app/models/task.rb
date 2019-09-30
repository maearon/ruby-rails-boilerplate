class Task < ActiveRecord::Base
  belongs_to :project
  has_one_attached :avatar
  has_one_attached :hover
  has_many_attached :images
end
