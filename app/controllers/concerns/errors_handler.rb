module ErrorsHandler
  extend ActiveSupport::Concern

  included do
    unless Rails.env.development?
      rescue_from StandardError, with: :rescue500
      rescue_from ActionController::RoutingError, with: :rescue404
      rescue_from ActiveRecord::RecordNotFound, with: :rescue404
    end
    rescue_from JWT::DecodeError, with: :rescue400
    rescue_from JWT::InvalidAudError, with: :rescue401
    rescue_from JWT::InvalidIssuerError, with: :rescue401
    rescue_from JWT::InvalidSubError, with: :rescue401
    rescue_from JWT::ExpiredSignature, with: :rescue401
  end

  private

  def rescue400(exception = nil)
    log_message = '400 Bad Request'
    log_message << " exception: #{exception.message}" if exception
    logger.warn log_message
    response400
  end

  def rescue401(exception = nil)
    log_message = '401 Unauthorized'
    log_message << " exception: #{exception.message}" if exception
    logger.warn log_message
    response401
  end

  def rescue403(exception = nil)
    log_message = '403 Forbidden'
    log_message << " exception: #{exception.message}" if exception
    logger.warn log_message
    response403
  end

  def rescue404(exception = nil)
    log_message = '404 Not Found'
    log_message << " exception: #{exception.message}" if exception
    logger.warn log_message
    response404
  end

  def rescue500(exception = nil)
    log_message = '500 Internal Server Error'
    log_message << " exception: #{exception.message} #{exception.backtrace.inspect}" if exception
    logger.error log_message
    response500
  end

  def rescue503(exception = nil)
    log_message = '503 Service Unavailable'
    log_message << " exception: #{exception.message} #{exception.backtrace.inspect}" if exception
    logger.error log_message
    response503
  end
end
