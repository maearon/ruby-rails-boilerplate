class ErrorsController < ApplicationController
  def not_found
    rescue404(ActionController::RoutingError.new("No route matches #{request.request_method} #{request.path}"))
  end
end
