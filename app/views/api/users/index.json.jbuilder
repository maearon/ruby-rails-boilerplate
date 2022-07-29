json.users do
  json.array!(@users) do |u|
    json.id u.id
    json.name u.name
    json.gravatar_id Digest::MD5::hexdigest(u.email.downcase)
    json.size 50
  end
end
json.total_count @users.total_count
