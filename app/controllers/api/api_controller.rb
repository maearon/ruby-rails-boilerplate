class Api::ApiController < ActionController::Base
  include ResponsesHandler
  include ErrorsHandler
  
  skip_before_action :verify_authenticity_token
  before_action :authenticate!

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
end
