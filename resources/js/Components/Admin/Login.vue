<template>
  <div class="background bg-gray-100">
    <div class="flex justify-center items-center h-screen">
      <div class="bg-white shadow-md shadow-gray-500 rounded-md p-8 mt-2" style="width: 516px; height: 670px; font-family: 'Advantage', serif;">
        <img src="\src\mmsu-logo.png" alt="Your Logo" class="mx-auto mb-2 mt-0" style="max-width: 230px;">
        <form @submit.prevent="login">
          <div class="mb-4" style="margin-top: 3rem;">
            <input type="text" id="username" v-model="username" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-green-800 focus:border-green-800" placeholder="Username" required>
          </div>
          <div class="mb-4" style="margin-bottom: 2rem;">
            <input type="password" id="password" v-model="password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-green-800 focus:border-green-800" placeholder="Password" required>
          </div>
          <div v-if="error" class="error-message text-red-500">
            {{ error }}
          </div>
          <div class="flex items-center mb-4" style="margin-top: 2rem;">
            <input type="checkbox" id="remember" name="remember" class="mr-2">
            <label for="remember" class="text-gray-700">Remember me</label>
          </div>
          <div class="mb-4" style="margin-top: 1rem;">
            <a href="#" class="text-green-800 hover:underline">Forgot password?</a>
          </div>
          <div class="flex justify-center mt-10">
            <button type="submit" class="w-40 h-10 rounded-full hover bg-green-800 text-white px-4 py-2 shadow-md lift-hover flex items-center justify-center">Login</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      username: '',
      password: '',
      error: '',
    };
  },
  methods: {
    async login() {
      this.error = '';

      if (!this.username || !this.password) {
        this.error = 'Please enter both username and password.';
        return;
      }

      const requestData = {
        username: this.username,
        password: this.password,
      };

      axios.post('/login', requestData).then(({ data }) => {
        if (data === 1) {
          this.$router.push('/admin/dashboard');
        } else {
          this.error = 'Username and Password Mismatched';
        }
      });
    },
  },
};
</script>
