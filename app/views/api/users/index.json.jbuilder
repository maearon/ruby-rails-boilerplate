json.users do
  json.array!(@users) do |u|
    json.id u.id
    json.name u.name
    json.email u.email
    json.gravatar_id Digest::MD5::hexdigest(u.email.downcase)
    json.size 30
    json.username u.username
    json.displayName u.displayName
    json.avatarUrl u.avatarUrl
  end
end
json.total_count @total
