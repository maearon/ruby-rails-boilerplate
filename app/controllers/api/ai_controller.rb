require "openai"

class Api::AiController < ApplicationController
  def chat
    message = params[:message] || params.dig(:ai, :message)

    if message.blank?
      render json: { error: "Message is required" }, status: :bad_request and return
    end

    # 👉 Fake response khi phát triển (không dùng API thật)
    if Rails.env.development?
      fake_answer = "Giả lập trả lời: Học Ruby on Rails hiệu quả bằng cách làm theo tutorial của Michael Hartl và thực hành dự án cá nhân."
      render json: { response: fake_answer } and return
    end

    client = OpenAI::Client.new(access_token: ENV["OPENAI_API_KEY"])

    response = client.chat(
      parameters: {
        model: "gpt-3.5-turbo",
        messages: [
          { role: "system", content: "Bạn là một trợ lý AI." },
          { role: "user", content: message }
        ]
      }
    )

    if response['error']
      render json: { error: response['error']['message'] }, status: :bad_request
    else
      render json: { response: response.dig("choices", 0, "message", "content") }
    end
  end
end
