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

// export interface CreateParams {
//   user: SignUpField
// }

// export interface SignUpField {
//   name: string
//   email: string
//   password: string
//   password_confirmation: string
// }

export interface CreateResponse {
  flash?: [message_type: string, message: string]
  error?: ErrorMessageType
}

export interface Response {
  flash?: [message_type: string, message: string]
}

const micropostApi = {
  getAll(params: ListParams): Promise<ListResponse<Micropost>> {
    const url = '';
    return API.get(url, { params });
  },

  // create(params: CreateParams): Promise<CreateResponse> {
  //   const url = '/microposts';
  //   return API.post(url, params);
  // },

  remove(id: number): Promise<Response> {
    const url = `/microposts/${id}`;
    return API.delete(url);
  },

  likeOrDislikeYoutubeVideo(videoId: string, rating: string): Promise<Response> {
    const url = `https://www.googleapis.com/youtube/v3/videos/rate?id=${videoId}&rating=${rating}`;
    return API.post(url);
  },
};

export default micropostApi;
