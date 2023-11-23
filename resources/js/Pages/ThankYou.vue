<template>
    <div class="thanku-page">
      <h1 class="text-xl font-serif ml-10">Thank you! Your request has been submitted for review.Please check you email for Status Update of your reservation </h1>
      <br>
      <p class="text-s italic text-gray-700 font-serif ml-10">"To complete your reservation, please download the reservation form by clicking the button above. 
Take the printed form to the university cashier's office to make the payment."</p>
        <p><router-link to="/">Go Home</router-link></p>
    </div>
  </template>
  
  <script>
  export default {
      
  }
  </script>
  
  <style scoped>
  .thanku-page {
    height: 100vh; /* 100% of the viewport height */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  </style>
  