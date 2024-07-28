"use server"
import API from '.';
// import { User } from '../../../redux/session/sessionSlice';

export interface UpdateResponse {
  user_id?: string
  flash?: [message_type: string, message: string]
  error?: string[]
}

export interface User {
  readonly id: number
  email: string
  name: string
  role: boolean
  avatar?: string
  passwordHash: string;
  test_cookie: string;
}

export interface UpdateParams {
  resend_activation_email: ResendActivationEmailField
}

export interface ResendActivationEmailField {
  email: string
}
export interface Response<User> {
  user?: User
  jwt?: string
  token?: string
  flash: [message_type: string, message: string]
}

const accountActivationApi = {
  create(params: UpdateParams): Promise<UpdateResponse> {
    const url = `/account_activations`;
    return API.post(url, params);
  },
  update(activation_token: string, email: string): Promise<Response<User>> {
    const url = `/account_activations/${activation_token}`;
    return API.patch(url, {email: email});
  }
};

export default accountActivationApi;
