class HealthCheckController < ApplicationController
  def status
    head :ok
  end
end
