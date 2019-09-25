module ProductsHelper
  # Remember the given product.
  def remember_product(product)
    session[:product_id] = product.id
  end
end
