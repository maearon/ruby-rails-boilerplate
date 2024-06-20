json.user do
  json.extract! @user, :id, :email, :name, :admin
  json.token @user.token
end
json.tokens do
  json.access do
    json.token @user.token
    json.expires @user.token_expiration_at
  end
  json.refresh do
    json.token @user.token
    json.expires @user.token_expiration_at
  end
end
