class PostMedia < ApplicationRecord
  belongs_to :post, optional: true
  has_one_attached :file

  enum type: { image: 0, video: 1 }

  def attach_file(uploaded_file)
    self.file.attach(uploaded_file)
    self.url = Rails.application.routes.url_helpers.rails_blob_path(file, only_path: true)
  end
end
