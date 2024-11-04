<template>
  <div class="auth-body">
    <div class="form-container login-container">
    <h2>Login</h2>
    <form @submit.prevent="submit">
      <label for="email">Email</label>
      <input type="email" v-model="login.email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" v-model="login.password" id="password" name="password" required>

      <!-- <input type="submit" value="Login"> -->
      <button :class="['btn', { loading: isLoading }]" :style="{cursor : isLoading ? 'default':'pointer'}" type="submit">
        <span class="text" v-if="!isLoading">Submit</span>
        <span class="spinner" v-if="isLoading"></span>
      </button>
    </form>
    <div class="register-link">
      <p>Don't have an account? <router-link :to="{name:'Register'}">Register here</router-link></p>
    </div>
  </div>
  </div>
</template>

<script setup>
import router from "@/router";
import store from "@/store";
import { ref } from "vue";

const login = {
  email:'',
  password:''
};

const isLoading = ref(false);

const submit = () => {
    isLoading.value = true;
    store.dispatch("login",login).then(()=> {
      router.push({name:"Home"});
    });
};
</script>

<style scoped>
.btn {
  width: 100%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 10px 20px;
  font-size: 16px;
  color: #fff;
  background-color: #ff6b81;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

/* Hidden spinner by default */
.spinner {
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 3px solid rgba(255, 255, 255, 0.3);
  border-top: 3px solid #fff;
  border-radius: 50%;
  animation: spin 0.6s linear infinite;
}

/* Spinner animation */
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.btn.loading .text {
  display: none;
}
</style>