json.user do
  json.id @user.id
  json.name @user.name
  json.email @user.email
  json.gravatar_id Digest::MD5::hexdigest(@user.email.downcase)
  json.size 50
  json.following @user.following.length
  json.followers @user.followers.length
  json.current_user_following_user @current_user.following?(@user) if @current_user
end
json.microposts do
  json.array!(@microposts) do |i|
    json.id i.id
    json.user_name i.user.name
    json.user_id i.user_id
    json.gravatar_id Digest::MD5::hexdigest(i.user.email.downcase)
    json.size 50
    json.content i.content
    json.image "#{request.ssl? ? 'https' : 'http'}://#{request.env['HTTP_HOST']}"+url_for(i.image.variant(:display)) if i.image.attached?
    json.timestamp time_ago_in_words(i.created_at)
  end
end
json.total_count @total
