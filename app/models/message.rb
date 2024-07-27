class Message < ApplicationRecord
  belongs_to :room
  broadcasts_to :room

  after_create_commit :broadcast_unread_count

  private

  def broadcast_unread_count
    # Replace this with your logic to calculate unread messages
    unread_count = Message.where(user_id: self.user_id, read: false).count

    ActionCable.server.broadcast("message_channel_#{self.user_id}", { unread_count: unread_count })
  end
end
