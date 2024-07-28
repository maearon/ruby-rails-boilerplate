import API from '.';
// import { User } from '../../../redux/session/sessionSlice';

export interface SessionParams {
  session: LoginField
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

export interface LoginField {
  username: string
  password: string
  // remember_me: string
}

export interface Response<User> {
  readonly id: number
  type: string
  currentAuthority: string
  user?: User
  tokens: {
    access: {
      token: string;
      expires: string;
    };
    refresh: {
      token: string;
      expires: string;
    };
  };
  flash?: [message_type: string, message: string]
  error?: string;
  status?: number
  message?: string
  errors: {
    [key: string]: string[]
  }
}

export async function create(params: SessionParams): Promise<Response<User>> {
  const url = '/login';
  return API.post(url, params);
}

export async function destroy(): Promise<any> {
  const url = '/logout';
  return API.delete(url);
}
