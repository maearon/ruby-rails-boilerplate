class Api::ApiController < ActionController::API
  include LocaleHelper
  helper_method :currency_code
  include ResponsesHandler
  include ErrorsHandler
  include ActionController::RequestForgeryProtection

  protect_from_forgery with: :exception
  
  skip_before_action :verify_authenticity_token

  private

  def pager(records)
    [records.size, records.pager(params)]
  end

  def error_message(error_message_key, options = nil)
    options.nil? ? I18n.t(error_message_key, scope: %i[errors messages]) : I18n.t(error_message_key, scope: %i[errors messages], **options)
  end

  def authenticate!
    response401_with_error(error_message(:not_logged_in)) unless logged_in?
  end

  def logged_in?
    !!current_user
  end

  def current_user
    user_id = Jwt::User::DecodeTokenService.call(request.headers['Authorization'])
    User.find_by(id: user_id) if user_id
  end

  def current_user_token
    request.headers['Authorization']&.split[1]
  end
end
