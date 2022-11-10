json.status 'ok'
json.type 'account'
json.currentAuthority @user.admin
json.user do
  json.extract! @user, :id, :email, :name
  json.role @user.admin
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
