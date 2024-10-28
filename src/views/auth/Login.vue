<template>
  <div class="auth-body">
    <div class="form-container login-container">
      <h2>Login</h2>
      <form @submit.prevent="submit">
        <label for="email">Email</label>
        <input type="email" v-model="login.email" id="email" name="email" required />

        <label for="password">Password</label>
        <input type="password" v-model="login.password" id="password" name="password" required />

        <button :class="['btn', { loading: isLoading }]" :style="{ cursor: isLoading ? 'default' : 'pointer' }" type="submit">
          <span class="text" v-if="!isLoading">Submit</span>
          <span class="spinner" v-if="isLoading"></span>
        </button>
      </form>
      <div class="register-link">
        <p>Don't have an account? <router-link :to="{ name: 'Register' }">Register here</router-link></p>
      </div>
      <!-- Display error message if any -->
      <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const login = ref({
    email: '',
    password: ''
});

const isLoading = ref(false);
const errorMessage = ref(null);
const router = useRouter();
const store = useStore();

const submit = async () => {
    isLoading.value = true;
    errorMessage.value = null; // Clear previous error messages
    try {
        await store.dispatch("login", login.value); // Dispatch the login action
        router.push({ name: "Home" }); // Redirect after successful login
    } catch (error) {
        errorMessage.value = "Login failed. Please check your credentials."; // Set error message
    } finally {
        isLoading.value = false; // Reset loading state
    }
};
</script>

<style scoped>
/* Your existing styles */
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

.spinner {
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 3px solid rgba(255, 255, 255, 0.3);
  border-top: 3px solid #fff;
  border-radius: 50%;
  animation: spin 0.6s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.btn.loading .text {
  display: none;
}

.error-message {
  color: red; /* Style for error messages */
  margin-top: 10px;
}
</style>
