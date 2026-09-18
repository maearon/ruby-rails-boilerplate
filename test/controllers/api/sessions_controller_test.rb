require "test_helper"

class Api::SessionsControllerTest < ActionDispatch::IntegrationTest
  def setup
    @user = users(:michael)
  end

  test "login returns distinct access and refresh tokens" do
    post "/api/login",
         params: { session: { email: @user.email, password: "password" } },
         as: :json

    assert_response :success

    json = JSON.parse(response.body)
    @user.reload
    assert_equal @user.refresh_token, json.dig("tokens", "refresh", "token")
    assert_equal @user.refresh_token, json["refresh_token"]
    assert json.dig("tokens", "access", "token").present?
    assert_not_equal json.dig("tokens", "access", "token"), json.dig("tokens", "refresh", "token")
  end

  test "refresh without bearer returns new tokens matching the frontend interceptor" do
    @user.generate_tokens!

    post "/api/refresh",
         params: { auth: { refresh_token: @user.refresh_token } },
         as: :json

    assert_response :success

    json = JSON.parse(response.body)
    assert json["token"].present?
    assert json["refresh_token"].present?
    assert_not_equal json["token"], json["refresh_token"]
    assert_equal json["token"], json.dig("tokens", "access", "token")
    assert_equal json["refresh_token"], json.dig("tokens", "refresh", "token")
  end
end
