module VariantsHelper
  # Remember the given product.
  def remember_variant(variant)
    session[:variant_id] = variant.id
  end
end
