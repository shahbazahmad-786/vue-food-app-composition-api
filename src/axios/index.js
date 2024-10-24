/**
 * @author shahbazahmad0987654321@gmail.com on 20/10/2024.
 */

import axios from "axios";
import store from "../store";
import router from "../router";

const axiosClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
});

axiosClient.interceptors.request.use((config) => {
  config.headers.Authorization = `Bearer ${store.state.user.token}`;
  return config;
});

axiosClient.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    if (error.response.status === 401) {
      store.commit("setToken", null);
      router.push({ name: "Login" });
    }
    throw error;
  }
);

export default axiosClient;