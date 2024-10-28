<template>
  <div class="auth-body">
    <div class="form-container register-container">
    <h2>Register</h2>
    <form @submit.prevent="submit">
      <label for="name">Name</label>
      <input type="text" v-model="register.name" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="email" v-model="register.email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" v-model="register.password" id="password" name="password" required>

      <input type="submit" value="Register">
    </form>
    <div class="login-link">
      <p>Already have an account? <router-link :to="{name:'Login'}">Login here</router-link></p>
    </div>
  </div>
  </div>
</template>

<script setup>
import router from "@/router";
import store from "@/store";

const register = {
  name:'',
  email:'',
  password:''
};

const submit = () => {
  store.dispatch("register",register).then(()=>{
    router.push({name:"Home"});
  });
};
</script>
