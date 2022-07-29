json.user do
  json.id @user.id
  json.name @user.name
  json.gravatar_id Digest::MD5::hexdigest(@user.email.downcase)
  json.size 80
  json.following @user.following.count
  json.followers @user.followers.count
  json.current_user_following_user @current_user.following?(@user)
end

if @current_user.following?(@user)
json.id_relationships @current_user.active_relationships.find_by(followed_id: @user.id).id
else
json.id_relationships nil
end

json.microposts do
  json.array!(@microposts) do |m|
    json.id m.id
    json.user_id m.user_id
    json.content m.content
    json.image "#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}"+url_for(m.display_image) if m.image.attached?
    json.timestamp time_ago_in_words(m.created_at)
  end
end
json.total_count @microposts.total_count
