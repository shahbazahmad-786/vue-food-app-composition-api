<template>
  <div class="auth-body">
    <div class="form-container login-container">
    <h2>Login</h2>
    <form @submit.prevent="submit">
      <label for="email">Email</label>
      <input type="email" v-model="login.email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" v-model="login.password" id="password" name="password" required>

      <input type="submit" value="Login">
    </form>
    <div class="register-link">
      <p>Don't have an account? <router-link :to="{name:'Register'}">Register here</router-link></p>
    </div>
  </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const login = {
    email:'',
    password:''
};

const submit = () => {
    console.log('Submit');
};
</script>
