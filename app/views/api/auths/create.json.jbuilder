json.user do
  json.extract! @user, :id, :email, :name
  json.role @user.admin
end
json.tokens do
  json.access do
    json.token @user.token
    json.expires @user.token_expiration_at
  end
end
json.refresh do
  json.access do
    json.token @user.refresh_token
    json.expires @user.refresh_token_expiration_at
  end
end
