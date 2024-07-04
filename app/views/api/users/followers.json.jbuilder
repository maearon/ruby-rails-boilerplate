json.users do
  json.array!(@users) do |u|
    json.id u.id
    json.name u.name
    json.gravatar_id Digest::MD5::hexdigest(u.email.downcase)
    json.size 50
  end
end
json.total_count @users.total_count
json.xusers do
  json.array!(@xusers) do |u|
    json.id u.id
    json.name u.name
    json.gravatar_id Digest::MD5::hexdigest(u.email.downcase)
    json.size 30
  end
end
json.user do
  json.id @user.id
  json.name @user.name
  json.following @user.following.count
  json.followers @user.followers.count
  json.micropost @user.microposts.count
  json.gravatar Digest::MD5::hexdigest(@user.email.downcase)
end
