import { createConsumer } from "@rails/actioncable"

const consumer = createConsumer()

document.addEventListener("DOMContentLoaded", () => {
  const room = document.getElementById("chat-room-id").value
  const chatChannel = consumer.subscriptions.create(
    { channel: "ChatChannel", room: room },
    {
      received(data) {
        console.log("Received message:", data.message)
        // Handle the received message (e.g., append to chat log)
      },
      sendMessage(message) {
        this.perform('send_message', { message: message })
      }
    }
  )

  // Example usage
  document.getElementById("send-button").addEventListener("click", () => {
    const message = document.getElementById("message-input").value
    chatChannel.sendMessage(message)
  })
})
