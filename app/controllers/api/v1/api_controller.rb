class Api::V1::ApiController < ApplicationController
  protect_from_forgery with: :null_session
end
