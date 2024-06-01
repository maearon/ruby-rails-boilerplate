json.user do
  json.id @user.id
  json.name @user.name
  json.gravatar_id Digest::MD5::hexdigest(@user.email.downcase)
  json.size 50
  json.following @user.following.length
  json.followers @user.followers.length
  json.current_user_following_user @current_user.following?(@user) if @current_user
end
json.microposts do
  json.array! @microposts
end
json.total_count @total
