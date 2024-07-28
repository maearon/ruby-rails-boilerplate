import kyInstance from "@/lib/ky";
import { useEffect, useState } from "react";
import { StreamChat, UserResponse } from "stream-chat";
import { useSession } from "../SessionProvider";
import { index } from "@/components/shared/api/userApi";

export default function useInitializeChatClient() {
  const { user } = useSession();
  const [chatClient, setChatClient] = useState<StreamChat | null>(null);

  useEffect(() => {
    const initializeChatClient = async () => {
      try {
        // Khởi tạo client Stream Chat
        const client = StreamChat.getInstance(process.env.NEXT_PUBLIC_STREAM_KEY!);

        // Upsert người dùng lên Stream Chat
        
        try {
          const usersResponse = await index({ page: 1 });
          const users = usersResponse.users;
          const transformedUsers: UserResponse[] = users.map(user => ({
            id: user.id,
            username: user.username,
            name: user.name,
            image: user.avatarUrl,
          }));
          await client.upsertUsers(transformedUsers)
          // client.partialUpdateUser({...users[0], set: {role: "admin"}})
          await client.partialUpdateUser({id: "00cffeed-248f-4fc5-92ff-b99ebbad7e8d", set: {role: "admin"}})
        } catch (error) {
          console.error("Failed to upsert users", error);
        }

        

        // const batchSize = 100; // Kích thước của mỗi batch
        // const upsertUsersInBatches = async (users: any[]) => {
        //   for (let i = 0; i < users.length; i += batchSize) {
        //     const batch = users.slice(i, i + batchSize);
        //     await client.partialUpdateUsers(batch);
        //   }
        // };

        // await upsertUsersInBatches(users);

        // Kết nối người dùng với Stream Chat
        await client.connectUser(
          {
            id: user.id,
            username: user.username,
            name: user.displayName,
            image: user.avatarUrl,
          },
          async () => {
            const response = await kyInstance.get("/api/get-token").json<{ token: string }>();
            return response.token;
          }
        );

        

        // Cập nhật state với client đã kết nối
        setChatClient(client);
      } catch (error) {
        console.error("Failed to initialize chat client", error);
      }

      // Cleanup khi component bị unmount
      return () => {
        if (chatClient) {
          chatClient.disconnectUser().catch((error) => console.error("Failed to disconnect user", error));
        }
      };
    };

    initializeChatClient();

    // Cleanup khi component bị unmount
    return () => {
      setChatClient(null);
    };
  }, [user.id, user.username, user.displayName, user.avatarUrl]);

  return chatClient;
}
