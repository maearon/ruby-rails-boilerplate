json.users do
  json.array!(@users) do |user|
    json.id user.id
    json.gravatar_url "https://secure.gravatar.com/avatar/#{Digest::MD5::hexdigest(user.email.downcase)}?s=50"
    json.name user.name
    json.url url_for(user)
  end
end
