if @user && @user.activated?
  json.user do
    json.id @user.id
    json.name @user.name
    json.admin @user.admin
    json.email @user.email
  end
  json.jwt @token
  json.token @user.remember_token
  json.flash ["success", "Account activated!"]
else
  json.flash ["danger", "Invalid activation link"]
end
