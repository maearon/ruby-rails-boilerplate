import { useToast } from "@/components/ui/use-toast";
// import { useUploadThing } from "@/lib/uploadthing";
import { createPostMedia } from "@/components/shared/api/micropostApi";
import { useState } from "react";
import { useSession } from "@/app/(main)/SessionProvider";

export interface Attachment {
  file: File;
  mediaId?: string;
  isUploading: boolean;
}

export default function useMediaUpload() {
  const { user } = useSession();
  const { toast } = useToast();

  const [attachments, setAttachments] = useState<Attachment[]>([]);

  const [isUploading, setIsUploading] = useState<boolean>(false);

  const [uploadProgress, setUploadProgress] = useState<number>();

  // const { startUpload, isUploading } = useUploadThing("attachment", {
  //   onBeforeUploadBegin(files) {
  //     const renamedFiles = files.map((file) => {
  //       const extension = file.name.split(".").pop();
  //       return new File(
  //         [file],
  //         `attachment_${crypto.randomUUID()}.${extension}`,
  //         {
  //           type: file.type,
  //         },
  //       );
  //     });

  //     setAttachments((prev) => [
  //       ...prev,
  //       ...renamedFiles.map((file) => ({ file, isUploading: true })),
  //     ]);

  //     return renamedFiles;
  //   },
  //   onUploadProgress: setUploadProgress,
  //   onClientUploadComplete(res) {
  //     setAttachments((prev) =>
  //       prev.map((a) => {
  //         const uploadResult = res.find((r) => r.name === a.file.name);

  //         if (!uploadResult) return a;

  //         return {
  //           ...a,
  //           mediaId: uploadResult.serverData.mediaId,
  //           isUploading: false,
  //         };
  //       }),
  //     );
  //   },
  //   onUploadError(e) {
  //     setAttachments((prev) => prev.filter((a) => !a.isUploading));
  //     toast({
  //       variant: "destructive",
  //       description: e.message,
  //     });
  //   },
  // });

  function filesToFileList(files: File[]): FileList {
    const dataTransfer = new DataTransfer();
  
    files.forEach(file => {
      dataTransfer.items.add(file);
    });
  
    return dataTransfer.files; // This is a FileList object
  }

  async function startUpload(files: File[]) {
    setIsUploading(true);
    const fileList = filesToFileList(files);
    const payload = new FormData();
    let image = fileList[0];
    let imageName = '';
    if (fileList && fileList[0]) {
      const sizeInMegabytes = fileList[0].size / 1024 / 1024;
      if (sizeInMegabytes > 512) {
        alert('Maximum file size is 512MB. Please choose a smaller file.');
      } else {
        image = fileList[0];
        imageName = fileList[0].name;
      }
    }
    if (image) {
      payload.append('micropost[image]', image, imageName);
    }
    // payload.append("post[userId]", user.id);
    payload.append("micropost[content]", 'content');
    console.log(fileList);

    
    try {
      const res = await createPostMedia(payload);

      if (res.error) {
        const errorMessage = Array.isArray(res.error) ? res.error.join(", ") : "Unknown error occurred";
        throw new Error(errorMessage);
      }

      setAttachments((prev) =>
        [...prev, ...files.map((file) => ({ file, isUploading: false }))]
      );

      // setAttachments((prev) =>
      //   prev.map((a) => {
      //     const uploadResult = res.attachments.find((r) => r.file.name === a.file.name);

      //     if (!uploadResult) return a;

      //     return {
      //       ...a,
      //       mediaId: uploadResult.mediaId,
      //       isUploading: false,
      //     };
      //   }),
      // );

      // toast({
      //   variant: "default",
      //   description: response.flash?.[1] || "Files uploaded successfully",
      // });
    } catch (error) {
      const errorMessage = error instanceof Error ? error.message : "An unexpected error occurred";
      setAttachments((prev) =>
        prev.filter((a) => !a.isUploading)
      );
      toast({
        variant: "destructive",
        description: errorMessage,
      });
    } finally {
      setIsUploading(false);
    }
  }

  function handleStartUpload(files: File[]) {
    if (isUploading) {
      toast({
        variant: "destructive",
        description: "Please wait for the current upload to finish.",
      });
      return;
    }

    if (attachments.length + files.length > 5) {
      toast({
        variant: "destructive",
        description: "You can only upload up to 5 attachments per post.",
      });
      return;
    }

    startUpload(files);
  }

  function removeAttachment(fileName: string) {
    setAttachments((prev) => prev.filter((a) => a.file.name !== fileName));
  }

  function reset() {
    setAttachments([]);
    setUploadProgress(undefined);
  }

  return {
    startUpload: handleStartUpload,
    attachments,
    isUploading,
    uploadProgress,
    removeAttachment,
    reset,
  };
}
