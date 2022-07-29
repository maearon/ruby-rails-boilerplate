if current_user
  json.user do
    json.id @user.id
    json.name @user.name
    json.admin @user.admin
    json.email @user.email
  end
end

