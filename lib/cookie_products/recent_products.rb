class RecentProducts < CookieCollection
  RECENT_PRODUCT_SIZE = 16

  def initialize cookies
    super cookies
    self.ids = ids.last RECENT_PRODUCT_SIZE
    ids.each {|product_id| push Product.find(product_id)}
  end

  def push product
    delete product
    while length > RECENT_PRODUCT_SIZE - 1
      delete_at 0
    end
    super product
  end
end
