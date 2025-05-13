module MCP
  module Rails
    def self.tools
      [
        {
          type: "function",
          function: {
            name: "echo",
            description: "Echoes the user's input back",
            parameters: {
              type: "object",
              properties: {
                message: { type: "string", description: "The message to echo" }
              },
              required: ["message"]
            }
          }
        }
      ]
    end
  end
end
