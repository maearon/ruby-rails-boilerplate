class Api::StaticPagesController < Api::ApiController
  def home
    if logged_in?
      @feed_items = current_user.feed.page(params[:page])
      @current_user = current_user if current_user
    else
      head :ok
    end
  end
end
