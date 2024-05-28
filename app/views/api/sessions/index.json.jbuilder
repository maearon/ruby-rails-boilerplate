if @current_user then
  json.user do
    json.id @current_user.id
    json.email @current_user.email
    json.name @current_user.name
    json.role @current_user.admin
    json.avatar "https://secure.gravatar.com/avatar/#{Digest::MD5::hexdigest(@current_user.email.downcase)}?s=50"
  end
end
