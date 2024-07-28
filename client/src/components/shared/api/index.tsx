import axios, { AxiosRequestConfig, AxiosResponse, InternalAxiosRequestConfig } from 'axios';

axios.defaults.xsrfCookieName = 'CSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-CSRF-Token';
axios.defaults.withCredentials = true;

const API = axios.create({
  baseURL: 'https://ruby-rails-boilerplate-3s9t.onrender.com/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'x-lang': 'EN'
  },
});

API.interceptors.request.use(
  (config: InternalAxiosRequestConfig) => {
    config.headers = config.headers || {};
    delete config.headers['Authorization'];
    return config;
  },
  (error: any) => {
    return Promise.reject(error);
  }
);

API.interceptors.response.use(
  (response: AxiosResponse) => {
    return response.data;
  },
  (error: any) => {
    return Promise.reject(error);
  }
);

export default API;
