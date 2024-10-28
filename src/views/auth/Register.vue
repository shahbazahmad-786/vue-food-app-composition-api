<template>
  <div class="auth-body">
    <div class="form-container register-container">
      <h2>Register</h2>
      <form @submit.prevent="submit">
        <label for="username">Username</label>
        <input type="text" v-model="register.username" id="username" name="username" required />

        <label for="email">Email</label>
        <input type="email" v-model="register.email" id="email" name="email" required />

        <label for="password">Password</label>
        <input type="password" v-model="register.password" id="password" name="password" required />

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" v-model="register.confirmPassword" id="confirmPassword" name="confirmPassword" required />

        <button :class="['btn', { loading: isLoading }]" :style="{ cursor: isLoading ? 'default' : 'pointer' }" type="submit">
          <span class="text" v-if="!isLoading">Submit</span>
          <span class="spinner" v-if="isLoading"></span>
        </button>
      </form>
      <div class="login-link">
        <p>Already have an account? <router-link :to="{ name: 'Login' }">Login here</router-link></p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import router from "@/router";
import store from "@/store";

const register = {
  username: '',
  email: '',
  password: '',
  confirmPassword: ''
};

const isLoading = ref(false);

const submit = async () => {
  isLoading.value = true;
  
  // You might want to add a check for matching passwords
  if (register.password !== register.confirmPassword) {
    alert("Passwords do not match!");
    isLoading.value = false;
    return;
  }

  try {
    await store.dispatch("register", register); // Ensure this action is defined in your Vuex store
    router.push({ name: "Login" }); // Redirect to login after successful registration
  } catch (error) {
    console.error("Registration error:", error); // Handle error appropriately
    // Display an error message to the user if needed
  } finally {
    isLoading.value = false; // Reset loading state
  }
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

