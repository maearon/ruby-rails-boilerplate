# app/controllers/concerns/responses_handler.rb
module ResponsesHandler
  extend ActiveSupport::Concern

  private

  def render_response(status_code, message:, option_data: {})
    render status: status_code, json: {
      status: status_code,
      message: message
    }.merge(option_data)
  end

  def response200(class_name = controller_name, method_name = action_name, option_data: {})
    message = "OK #{class_name.classify} #{method_name.classify}"
    render_response(:ok, message: message, option_data: option_data)
  end

  def response201(class_name = controller_name, option_data: {})
    message = "Created #{class_name.classify}"
    render_response(:created, message: message, option_data: option_data)
  end

  def response400(option_data: {})
    render_response(:bad_request, message: "Bad Request", option_data: option_data)
  end

  def response401(option_data: {})
    render_response(:unauthorized, message: "Unauthorized", option_data: option_data)
  end

  def response403(option_data: {})
    render_response(:forbidden, message: "Forbidden", option_data: option_data)
  end

  def response404(class_name = nil, option_data: {})
    class_msg = class_name.present? ? "#{class_name.classify} " : ''
    render_response(:not_found, message: "#{class_msg}Not Found", option_data: option_data)
  end

  def response422(option_data: {})
    render_response(:unprocessable_entity, message: "Unprocessable Entity", option_data: option_data)
  end

  def response426(option_data: {})
    render_response(:upgrade_required, message: "Upgrade Required", option_data: option_data)
  end

  def response500(option_data: {})
    render_response(:internal_server_error, message: "Internal Server Error", option_data: option_data)
  end

  def response503(option_data: {})
    render_response(:service_unavailable, message: "Service Unavailable", option_data: option_data)
  end

  # --- Shortcut helpers for error cases ---

  def response401_with_error(message)
    response401(option_data: { errors: Array(message) })
  end

  def response403_with_error(message)
    response403(option_data: { errors: Array(message) })
  end

  def response404_with_error(message, class_name = nil)
    response404(class_name, option_data: { errors: Array(message) })
  end

  def response422_with_error(messages)
    response422(option_data: { errors: Array(messages) })
  end

  def response426_with_error(message)
    response426(option_data: { errors: Array(message) })
  end
end
