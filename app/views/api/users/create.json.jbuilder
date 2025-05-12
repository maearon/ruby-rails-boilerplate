json.user do
  json.extract! @user, :id, :email, :name
  json.role @user.admin
end
json.flash ["info", "Please check your email to activate your account."]