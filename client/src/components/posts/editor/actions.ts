"use server";

import { validateRequest } from "@/auth";
import { create } from "@/components/shared/api/micropostApi";
import prisma from "@/lib/prisma";
import { getPostDataInclude } from "@/lib/types";
import { createPostSchema } from "@/lib/validation";

export interface Attachment {
  file: File;
  mediaId?: string;
  isUploading: boolean;
}

export async function submitPost(input: {
  content: string;
  mediaIds: string[];
  attachments: Attachment[];
}) {
  const { user } = await validateRequest();

  if (!user) throw new Error("Unauthorized");

  const { content, mediaIds, attachments } = createPostSchema.parse(input);

  const newPost = await prisma.post.create({
    data: {
      content,
      userId: user.id,
      attachments: {
        connect: mediaIds.map((id) => ({ id })),
      },
    },
    include: getPostDataInclude(user.id),
  });

  // const payload = 
  //   { 
  //     post: {
  //             content,
  //             userId: user.id,
  //             attachments,
  //           }
  //   }
  // const response = await create(payload);

  // const newPost = response.post;

  return newPost;
}
