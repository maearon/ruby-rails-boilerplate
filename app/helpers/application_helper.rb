module ApplicationHelper
  # Returns the full title on a per-page basis.
  def full_title(page_title = '')
    # base_title = "Ruby on Rails Tutorial Sample App"
    base_title = "clotheshub #{title_locale(locale.to_s)}"
    if page_title.empty?
      base_title
    else
      page_title + " | " + base_title
    end
  end

  def title_locale(locale)
    case locale
      when "en" then "US"
      when "de" then "DE"
      when "fr" then "FR"
      when "vi" then "VN"
   end
  end

  def flash_classs(message_type)
  	case message_type
    	when "en" then "united-kingdom"
    	when "de" then "germany"
    	when "fr" then "france"
      when "vi" then "vietnam"
	 end
	end

  def flash_class(message_type)
    case message_type
      when "en" then "English"
      when "de" then "German"
      when "fr" then "French"
      when "vi" then "Vietnamese"
   end
  end

  def flash_classss(message_type)
    case message_type
      when "en" then "USD"
      when "de" then "EUR"
      when "fr" then "EUR"
      when "vi" then "VND"
   end
  end

  def is_active_controller(controller_name)
    if params[:controller] == controller_name
      "active"
    else
      nil
    end
  end

  def is_active_controllers(controller_names)
    controller_names.each do |name|
      if params[:controller] == name
        return "active"
      else
        nil
      end
    end
  end

  def is_active_controller_and_action(controller_name, action_name)
    if params[:controller] == controller_name && params[:action] == action_name
      "active"
    else
      nil
    end
  end
end
