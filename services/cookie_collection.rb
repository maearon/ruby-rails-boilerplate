class CookieCollection < Array
  attr_accessor :ids
  LIFE_TIME = 1

  def initialize cookies
    @cookies = cookies
    if @cookies[cookie_name].present?
      self.ids = @cookies[cookie_name].split(',')
    else
      self.ids = Array.new
    end
  end

  def push object
    super object
    update_cookie
  end

  private
  def update_cookie
    ids = map(&:id)
    @cookies[cookie_name] = {
      value: ids.join(','),
      expires: LIFE_TIME.years.from_now
    }
  end

  def cookie_name
    self.class.name.parameterize
  end
end
