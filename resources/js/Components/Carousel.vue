<template>
    <div class="carousel" @mouseenter="stopAutoSlide" @mouseleave="startAutoSlide">
      <div class="carousel-inner" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
        <div v-for="(image, index) in images" :key="index" class="carousel-item">
          <img :src="image.url" :alt="`Image ${index + 1}`" class="d-block w-100" :style="{ objectFit: 'cover' }">
        </div>
      </div>
      <div class="carousel-indicators">
        <span
          v-for="(image, index) in images"
          :key="index"
          class="indicator"
          :class="{ active: index === currentSlide }"
          @click="goToSlide(index)"
        ></span>
      </div>
      <a class="carousel-control-prev" @click="prevSlide">&lt;</a>
      <a class="carousel-control-next" @click="nextSlide">&gt;</a>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      images: {
        type: Array,
        default: () => []
      }
    },
    data() {
      return {
        currentSlide: 0,
        totalSlides: 0,
        intervalId: null
      };
    },
    mounted() {
      this.totalSlides = this.images.length;
      this.startAutoSlide();
    },
    methods: {
      startAutoSlide() { 
        this.intervalId = setInterval(this.nextSlide, 3000);
      },
      stopAutoSlide() {
        clearInterval(this.intervalId);
      },
      
      nextSlide() {
      console.log('Next slide clicked');
      this.currentSlide++;
      if (this.currentSlide >= this.totalSlides) {
        this.currentSlide = 0;
      }
    },
    prevSlide() {
      console.log('Previous slide clicked');
      this.currentSlide--;
      if (this.currentSlide < 0) {
        this.currentSlide = this.totalSlides - 1;
      }
    },


        goToSlide(index) {
        this.currentSlide = index;
        }
    }
  }
  </script>

  
  <style scoped>
  /* Add your carousel styling here */
  .carousel {
    position: relative;
    overflow: hidden;
  }
  
  .carousel-inner {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }
  
  .carousel-item {
    min-width: 100%;
    max-height: 400px; /* Set a max height for the images */
    overflow: hidden;
  }
  
  .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure images maintain aspect ratio */
  }
  
  .carousel-indicators {
    display: flex;
    justify-content: center;
    margin-top: 10px;
  }
  
  .indicator {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: gray;
    margin: 0 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }
  
  .indicator.active {
    background-color: black;
  }
  
  .carousel-control-prev,
  .carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
    cursor: pointer;
    color: white;
    font-size: 60px; /* Adjust arrow size */
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5); /* Add text shadow */
  }
  
  .carousel-control-prev {
    left: 10px;
  }
  
  .carousel-control-next {
    right: 10px;
  }
  </style>
  