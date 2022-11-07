json.user do
  json.extract! @user, :id, :email, :name
  json.role @user.admin
end
