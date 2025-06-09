# app/controllers/concerns/locale_helper.rb
module LocaleHelper
  private
  
  def currency_code(locale)
    case locale
    when "en" then "USD"
    when "de" then "EUR"
    when "fr" then "EUR"
    when "vi" then "VND"
    else "USD"
    end
  end
end