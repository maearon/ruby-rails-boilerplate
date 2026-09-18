json.user do
  json.extract! @user, :id, :email, :name, :admin
  json.token @user.token
  json.passwordHash @user.password_digest
end
json.token @user.token
json.refresh_token @user.refresh_token
json.tokens do
  json.access do
    json.token @user.token
    json.expires @user.token_expiration_at
  end
  json.refresh do
    json.token @user.refresh_token
    json.expires @user.refresh_token_expiration_at
  end
end
