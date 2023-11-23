<template>
  <header>
        <Navbar />
      </header>
    <main>
    <div>
      <!-- Full-width image section -->
      <div class="relative">
        <img
          src="src/fem-hall-facade.jpg"
          alt="Background Image"
          class="w-full"
        />
        <div class="absolute inset-0 flex items-center justify-center bg-opacity-70 bg-white">
          <div class="text-center text-black">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold">Welcome to MMSU Facility Reservation</h1>
            <p class="mb-4 mt-4 text-base lg:text-s" >Your gateway to hassle-free facility booking and event planning. Explore our diverse range of facilities,
                        check rates, and reserve with ease. Let's make your events unforgettable!</p>
             <router-link to="/facilities" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
            Make New Reservation
            </router-link>
          </div>
        </div>
      </div>
  
      <!-- Rest of your content -->

        <div class="bg-white">
        <!-- First section -->
        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quisquam autem voluptas laboriosam voluptates quas consectetur, eius quis cupiditate. Eveniet, voluptate architecto doloribus illo ratione dolorum possimus blanditiis sapiente quaerat?</h4>
            <h1>THIS IS FOR THE IMAGE CAROUSEL</h1>
        </div>

        <div class="bg-gray-100">
        <!-- Second section -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam hic atque, nobis fuga sed sapiente natus tempore optio quam corporis reiciendis id nulla ea vitae quas provident velit aliquam dignissimos!</p>
        <p>Insert texT HERE</p>
        <p>INSERT TEXT HERE</p>
        <p>INSERT TEXT HERE</p>
        </div>
      
         <!-- FAQs Section -->
         <div class="bg-gray-200 p-4">
            <h2 class="text-green-600 text-2xl text-center font-semibold mb-4">Frequently Asked Questions</h2>
            <div class="mx-auto w-full max-w-lg">
              <div v-for="(faq, index) in faqs" :key="index" class="mb-4">
                <button class="bg-gray-400 w-full p-2 text-left font-semibold rounded-lg text-center" @click="toggleFAQ(index)">
                  {{ faq.question }}
                </button>
                <div v-if="faq.open" class="bg-white p-4 mt-2 rounded-lg">
                  {{ faq.answer }}
                </div>
              </div>
            </div>
          </div>
    </div>

</main>

<footer>
        <Footer />
</footer>

</template>

  
<script >


import Navbar from "../Components/Navbar.vue"
import Footer from '../Components/Footer.vue'

export default {

  components:{
        Navbar,
        Footer
    },
  
  data() {
    return {
      faqs: [
        { question: 'What is this service?', answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', open: false },
        { question: 'How can I make a reservation?', answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', open: false },
        { question: 'Are there any additional fees?', answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', open: false },
        { question: 'How do I cancel a reservation?', answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', open: false },
      ],
    };
  },
  methods: {
    toggleFAQ(index) {
      this.faqs.forEach((faq, i) => {
        if (i === index) {
          faq.open = !faq.open;
        } else {
          faq.open = false;
        }
      });
    },
  },
};
</script>


<style lang="">
    
</style>