json.user do
  json.id @user.id
  json.name @user.name
  json.email @user.email
end
json.gravatar "https://secure.gravatar.com/avatar/#{Digest::MD5::hexdigest(@user.email.downcase)}?s=80"
