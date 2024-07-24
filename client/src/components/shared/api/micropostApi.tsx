"use server"
import API from '.';
import { ErrorMessageType } from '../errorMessages';

export interface ListParams {
  page?: number
  [key: string]: any
}

export interface ListResponse<Micropost> {
  feed_items: Micropost[]
  followers: number
  following: number
  gravatar: string
  micropost: number
  total_count: number
}

export interface Micropost {
  readonly id: number
  content: string
  gravatar_id?: string
  image: string
  size: number
  timestamp: string
  readonly user_id: number
  user_name?: string
  title?: string
  description?: string
  videoId?: string
  channelTitle?: string
}

export interface CreateResponse {
  flash?: [message_type: string, message: string]
  error?: ErrorMessageType
  post: Post
  attachments: Attachment[]
}

export interface Response {
  flash?: [message_type: string, message: string]
}

export interface Post {
  readonly id: string
  content: string
  attachments: string[]
  // timestamp: string
  // readonly userId: string
  // userDisplayName: string
}

export interface Attachment {
  file: File;
  mediaId?: string;
  isUploading: boolean;
}

export interface PostCreate {
  content: string,
  userId: string,
  attachments: File[]
}

export interface CreatePostPayload {
  post: PostCreate,
}

export async function getAll(params: ListParams): Promise<ListResponse<Micropost>> {
  const url = '';
  return API.get(url, { params });
}

export async function createPostMedia(payload: FormData): Promise<CreateResponse> {
  const url = '/post_medias';
  return API.post(url, payload, { headers: { 'Content-Type': 'multipart/form-data' }});
}

export async function createPost(payload: CreatePostPayload): Promise<CreateResponse> {
  const url = '/posts';
  return API.post(url, payload, { headers: { 'Content-Type': 'multipart/form-data' }});
}

export async function remove(id: number): Promise<Response> {
  const url = `/posts/${id}`;
  return API.delete(url);
}

export async function likeOrDislikeYoutubeVideo(videoId: string, rating: string): Promise<Response> {
  const url = `https://www.googleapis.com/youtube/v3/videos/rate?id=${videoId}&rating=${rating}`;
  return API.post(url);
}
