import axios, { AxiosRequestConfig, AxiosResponse, InternalAxiosRequestConfig } from 'axios';

// Determine the base URL based on the environment
const BASE_URL = process.env.NODE_ENV === 'development'
  ? 'http://localhost:3001/api'
  : 'https://railstutorialapi.onrender.com/api';

// Set up default configurations
axios.defaults.xsrfCookieName = 'CSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-CSRF-Token';
axios.defaults.withCredentials = true;

const API = axios.create({
  baseURL: BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'x-lang': 'EN'
  },
});

// Interceptor for requests
API.interceptors.request.use(
  (config: InternalAxiosRequestConfig) => {
    // Ensure headers are defined
    config.headers = config.headers || {};
    
    // No need to add Authorization headers if using cookies
    // Remove any potential Authorization headers
    delete config.headers['Authorization'];

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

// Interceptor for responses
API.interceptors.response.use(
  (response: AxiosResponse) => {
    return response.data;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default API;
