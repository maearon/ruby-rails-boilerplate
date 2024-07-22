"use server"
import API from ".";

export interface CreateParams {
  followed_id: string | string[] | undefined
}

export interface CreateResponse {
  follow: boolean
}

export interface DestroyResponse {
  unfollow: boolean
}

const relationshipApi = {
  create(params: CreateParams): Promise<CreateResponse> {
    const url = '/relationships';
    return API.post(url, params);
  },

  destroy(id: number): Promise<DestroyResponse> {
    const url = `/relationships/${id}`;
    return API.delete(url);
  },
};

export default relationshipApi;
