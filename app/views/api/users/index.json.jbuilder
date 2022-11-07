json.partial! partial: 'layouts/pager', records: @users, total: @total, index: lambda { |records|
  json.array! records, :id, :name, :email
}
