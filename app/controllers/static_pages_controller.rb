class StaticPagesController < ApplicationController

  def detect_locale
    I18n.locale = extract_locale_from_accept_language_header
    redirect_to root_path(locale: I18n.locale)
  end

  def home
    if logged_in?
      @micropost  = current_user.microposts.build
      @feed_items = current_user.feed.page(params[:page])
      # @recent_products = recent_products.fetch_recent_products
    end
  end

  def help
  end

  def about
  end

  def contact
  end

  private

  def extract_locale_from_accept_language_header
     request.env['HTTP_ACCEPT_LANGUAGE'].scan(/^[a-z]{2}/).first
  end
end
