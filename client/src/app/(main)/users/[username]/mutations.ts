import { useToast } from "@/components/ui/use-toast";
import { PostsPage } from "@/lib/types";
// import { useUploadThing } from "@/lib/uploadthing";
import { UpdateUserProfileValues } from "@/lib/validation";
import {
  InfiniteData,
  QueryFilters,
  useMutation,
  useQueryClient,
} from "@tanstack/react-query";
import { useRouter } from "next/navigation";
import { startAvatarUpload, updateUserProfile } from "./actions";
import { update, UpdateResponse } from "@/components/shared/api/userApi";
// import { validateRequest } from "@/auth";

export function useUpdateProfileMutation() {
  const { toast } = useToast();

  const router = useRouter();

  const queryClient = useQueryClient();

  // const { startUpload: startAvatarUpload } = useUploadThing("avatar");

  const mutation = useMutation({
    mutationFn: async ({
      values,
      avatar,
    }: {
      values: UpdateUserProfileValues;
      avatar?: File;
    }) => {
      let avatarUploadPromise: Promise<UpdateResponse | null>;
    
      if (avatar) {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(avatar);
  
        const payload = new FormData();
        payload.append('user[avatar]', dataTransfer.files[0], dataTransfer.files[0].name);
  
        avatarUploadPromise = startAvatarUpload(payload);
      } else {
        avatarUploadPromise = Promise.resolve(null);
      }

      return Promise.all([
        updateUserProfile(values),
        avatarUploadPromise,
      ]);
    },
    onSuccess: async ([updatedUser, uploadResult]) => {
      const newAvatarUrl = uploadResult?.avatarUrl;

      const queryFilter: QueryFilters = {
        queryKey: ["post-feed"],
      };

      await queryClient.cancelQueries(queryFilter);

      queryClient.setQueriesData<InfiniteData<PostsPage, string | null>>(
        queryFilter,
        (oldData) => {
          if (!oldData) return;

          return {
            pageParams: oldData.pageParams,
            pages: oldData.pages.map((page) => ({
              nextCursor: page.nextCursor,
              posts: page.posts.map((post) => {
                if (post.user.id === updatedUser.id) {
                  return {
                    ...post,
                    user: {
                      ...updatedUser,
                      avatarUrl: newAvatarUrl || updatedUser.avatarUrl,
                    },
                  };
                }
                return post;
              }),
            })),
          };
        },
      );

      router.refresh();

      toast({
        description: "Profile updated",
      });
    },
    onError(error) {
      console.error('error update user', error);
      toast({
        variant: "destructive",
        description: "Failed to update profile. Please try again.",
      });
    },
  });

  return mutation;
}
