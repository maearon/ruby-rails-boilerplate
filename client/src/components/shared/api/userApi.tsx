import API from '.';
import { Micropost } from './micropostApi';
import { User as UserCreate } from '../../../redux/session/sessionSlice';

export interface ListParams {
  page?: number
  [key: string]: any
}

export interface ListResponse<User> {
  users: User[]
  total_count: number
}

export interface User {
  readonly id: number
  name: string
  gravatar_id: string
  size: number
}

export interface CreateParams {
  user: SignUpField
}

export interface SignUpField {
  name: string
  email: string
  password: string
  password_confirmation: string
}

export interface CreateResponse<UserCreate> {
  user?: UserCreate
  flash?: [message_type: string, message: string]
  status?: number
  message?: string
  errors?: {
    [key: string]: string[]
  }
  error?: string;
}

export interface UserShow {
  readonly id: number
  name: string
  gravatar_id: string
  size: number
  following: number
  followers: number
  current_user_following_user: boolean
}

export interface ShowResponse<UserShow> {
  user: UserShow
  id_relationships?: number
  microposts: Micropost[]
  total_count: number
}

export interface UserEdit {
  name: string
  email: string
}

export interface EditResponse {
  user: UserEdit
  gravatar: string
  flash?: [message_type: string, message: string]
}

export interface UpdateParams {
  user: UpdateField
}

export interface UpdateField {
  // name: string
  // email: string
  // password: string
  // password_confirmation: string
}

export interface UpdateResponse {
  flash_success?: [message_type: string, message: string]
  error?: string[]
  avatarUrl?: string
}

export interface Response {
  flash?: [message_type: string, message: string]
}

const userApi = {
  index(params: ListParams): Promise<ListResponse<User>> {
    const url = '/users';
    return API.get(url, { params });
  },

  create(params: CreateParams): Promise<CreateResponse<UserCreate>> {
    const url = '/users';
    return API.post(url, params);
  },

  show(id: string, params: ListParams): Promise<ShowResponse<UserShow>> {
    const url = `/users/${id}`;
    return API.get(url, { params });
  },

  edit(id: string): Promise<EditResponse> {
    const url = `/users/${id}/edit`;
    return API.get(url);
  },

  update(id: string, payload: FormData): Promise<UpdateResponse> {
    const url = `/users/${id}`;
    return API.patch(url, payload, { headers: { 'Content-Type': 'multipart/form-data' }});
  },

  destroy(id: number): Promise<Response> {
    const url = `/users/${id}`;
    return API.delete(url);
  },

  follow(id: string, page: number, lastUrlSegment: string): Promise<FollowResponse<UserFollow,IUserFollow>> {
    const url = `/users/${id}/${lastUrlSegment}`;
    return API.get(url, { params: { page } });
  },

  // following(id: string, page: number): Promise<FollowResponse<UserFollow,IUserFollow>> {
  //   const url = `/users/${id}`;
  //   return API.delete(url);
  // },

  // followers(id: string, page: number): Promise<FollowResponse<UserFollow,IUserFollow>> {
  //   const url = `/users/${id}`;
  //   return API.delete(url);
  // },
};

export default userApi;
export const { create } = userApi;
export const { update } = userApi;

export interface UserFollow {
  readonly id: number
  name: string
  gravatar_id: string
  size: number
}

export interface FollowResponse<UserFollow,IUserFollow> {
  users: UserFollow[]
  xusers: UserFollow[]
  total_count: number
  user: IUserFollow
}

export interface IUserFollow {
  readonly id: number
  name: string
  followers: number
  following: number
  gravatar: string
  micropost: number
}
