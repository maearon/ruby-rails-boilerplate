class Cart < ApplicationRecord
  has_many :cart_items, dependent: :destroy
  belongs_to :user, optional: true
  # has_and_belongs_to_many :products
  # has_and_belongs_to_many :variants
  # has_many :products, :through => :cart_items


  def add_product(product_params)

    current_item = cart_items.find_by(variant_id: product_params[:product][:variant_id])

    if current_item
      product_params[:product][:action] == 'edit' ?
      current_item.quantity = product_params[:product][:quantity].to_i :
      current_item.quantity += product_params[:product][:quantity].to_i
      current_item.save
    else
      new_item = cart_items.create(product_id: product_params[:product][:product_id],variant_id: product_params[:product][:variant_id], quantity: product_params[:product][:quantity], cart_id: self.id)
    end

    new_item
  end

  def total_item
    cart_items.inject(0) { |sum, l| sum + l.quantity }
  end

  def total_originalvalue
    cart_items.inject(0.0) { |sum, l| sum + l.variant.originalprice * l.quantity }
  end

  def total_value
    cart_items.inject(0.0) { |sum, l| sum + l.variant.price * l.quantity }
  end

  def sale
    self.total_value - self.total_originalvalue
  end
end
