class ReviewsController < ApplicationController
	def create
		@product = Product.find(params[:product_id])
		@review = @product.reviews.create(review_params)
		redirect_to request.referrer
	end

	def destroy
		@product = Product.find(params[:product_id])
		@review = @product.reviews.find(params[:id])
		@review.destroy
		redirect_to request.referrer
	end

	private
	def review_params
		params.require(:review).permit(:reviewer, :content)
	end
end
