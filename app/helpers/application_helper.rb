module ApplicationHelper
  # Returns the full title on a per-page basis.
  def full_title(page_title = '')
    base_title = "Hub - Bootstrap 4 Ecommerce Template"
    if page_title.empty?
      base_title
    else
      page_title + " | " + base_title
    end
  end

  def flash_classs(message_type)
  	case message_type
    	when "us" then "united-kingdom"
    	when "de" then "germany"
    	when "fr" then "france"
	 end
	end

  def flash_class(message_type)
    case message_type
      when "us" then "English"
      when "de" then "German"
      when "fr" then "French"
   end
  end

  def flash_classss(message_type)
    case message_type
      when "us" then "USD"
      when "de" then "EUR"
      when "fr" then "EUR"
      # when "en" then "GBP"
   end
  end
end
