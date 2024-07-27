// hooks/useMessageCount.ts
import { useEffect, useState } from 'react';
import { createConsumer } from '@rails/actioncable';

const cable = createConsumer(process.env.NEXT_PUBLIC_CABLE_URL!);

export function useMessageCount(userId: string) {
  const [unreadCount, setUnreadCount] = useState<number>(0);

  useEffect(() => {
    const channel = cable.subscriptions.create(
      { channel: "MessageChannel", user_id: userId },
      {
        received(data: { unread_count: number }) {
          setUnreadCount(data.unread_count);
        }
      }
    );

    return () => {
      channel.unsubscribe();
    };
  }, [userId]);

  return unreadCount;
}
