json.users do
  json.array!(@users) do |u|
    json.id u.id
    json.name u.name
    json.username u.username
    json.displayName u.displayName
    json.avatarUrl u.avatarUrl
  end
end
json.total_count @total
