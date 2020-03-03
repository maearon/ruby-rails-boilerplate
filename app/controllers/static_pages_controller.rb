class StaticPagesController < ApplicationController

  def home
  end

  def detect_locale
    I18n.locale = extract_locale_from_accept_language_header
    redirect_to root_path(locale: I18n.locale)
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
