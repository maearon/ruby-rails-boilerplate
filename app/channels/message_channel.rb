# app/channels/message_channel.rb
class MessageChannel < ApplicationCable::Channel
  def subscribed
    # Stream from a channel based on the current user's ID or another identifier
    stream_from "message_channel_#{current_user.id}"
  end

  def unsubscribed
    # Any cleanup needed when channel is unsubscribed
  end
end
