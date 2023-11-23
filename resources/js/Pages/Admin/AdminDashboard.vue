<template>
    <div>
      <h1>Welcome to the Admin Dashboard!</h1>
      <p>This page is only visible to authenticated users.</p>
      <button @click="logout">Logout</button>
    </div>
  </template>
  
  <script>
import axios from 'axios';

  export default {
    methods: {
      logout() {
        axios.post('/logout').then(({data})=>{
          this.checkUser();
        })
      },

      checkUser(){
        axios.post('/check-user').then(({data})=>{
          if(!data){
            this.$router.push('/admin/login')
          }
        })
      }
    },
    mounted() {
      this.checkUser();
    
    },
  };
  </script>
  