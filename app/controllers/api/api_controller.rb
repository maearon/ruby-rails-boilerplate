class Api::ApiController < ActionController::Base
  skip_before_action :verify_authenticity_token
  # include ApiSessionsHelper

  private
    def auth_header
      request.headers['Authorization']
    end

    # Logs in the given user.
    def log_in(user)
      session[:user_id] = user.id
    end

    # Remembers a user in a persistent session.
    def remember(user)
      user.remember
      # cookies.permanent.encrypted[:user_id] = user.id
      # cookies.permanent[:remember_token] = user.remember_token
    end

    # Returns the user corresponding to the remember token cookie.
    def current_user
      decoded_hash = decoded_token
      if !decoded_hash.empty? 
        puts decoded_hash.class
        user_id = decoded_hash[0]['user_id']
      else
        nil 
      end

      if (auth_header.split(' ')[2] === "null")
        @current_user ||= User.find_by(id: user_id)
      elsif user_id
        user = User.find_by(id: user_id)
        if user && user.authenticated?(:remember, auth_header.split(' ')[2])
          log_in user
          @current_user = user
        end
      end
    end

    # Returns true if the given user is the current user.
    def current_user?(user)
      user == current_user
    end

    # Returns true if the user is logged in, false otherwise.
    def logged_in?
      !current_user.nil?
    end

    # Forgets a persistent session.
    def forget(user)
      user.forget
      # cookies.delete(:user_id)
      # cookies.delete(:remember_token)
    end

    # Logs out the current user.
    def log_out
      forget(current_user)
      session.delete(:user_id)
      @current_user = nil
    end

    # Redirects to stored location (or to the default).
    # def redirect_back_or(default)
    #   redirect_to(session[:forwarding_url] || default)
    #   session.delete(:forwarding_url)
    # end

    # Stores the URL trying to be accessed.
    # def store_location
    #   session[:forwarding_url] = request.original_url if request.get?
    # end

    def encode_token(payload)
      JWT.encode(payload, 'my_secret')
    end

    def decoded_token
      if auth_header
        token = auth_header.split(' ')[1]
        begin
          JWT.decode(token, 'my_secret', true, algorithm: 'HS256')
        rescue JWT::DecodeError
          []
        end
      end
    end

    # Confirms a logged-in user.
    def logged_in_user
      unless logged_in?
        # store_location
        render json: { flash: ["danger", "Please log in."] }
        # redirect_to login_url
      end
    end
end
