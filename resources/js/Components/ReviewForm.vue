<template>
    <div>
      <h2>Leave a Review</h2>
      <form>
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="name">
        </div>
        <div>
          <label for="rating">Rating:</label>
          <div class="star-rating">
            <span
              v-for="star in maxStars"
              :key="star"
              @mouseover="hoverRating(star)"
              @click="setRating(star)"
              @mouseleave="resetHover"
              :class="{ 'filled': star <= hoverValue, 'selected': star <= rating }"
              class="star"
            >
              <i class="fas fa-star"></i>
            </span>
          </div>
        </div>
        <div>
          <label for="comment">Comment:</label>
          <textarea id="comment" v-model="comment"></textarea>
        </div>
        <button @click.prevent="submitReview">Submit Review</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        rating: null,
        comment: '',
        hoverValue: 0,
        maxStars: 5,
      };
    },
    methods: {
        setRating(rating) {
            if (rating === this.rating) {
                // If the same star is clicked again, toggle the rating off
                this.rating = null;
            } else {
                this.rating = rating;
            }
            },
            
      hoverRating(rating) {
        this.hoverValue = rating;
      },
      resetHover() {
        this.hoverValue = this.rating || 0;
      },

      submitReview() {
        // Handle the review submission logic here (e.g., send data to a backend)
        // You can use axios or another method to send the review data
        // This function will be called when the user submits the review form
      },
    },
  };
  </script>
  
  <style scoped>
  /* Style the stars */
  .star {
    cursor: pointer;
    font-size: 1.2rem;
    color: #ccc;
    transition: color 0.2s;
  }
  .star:hover {
    color: orange; /* Change color on hover */
  }
  .filled {
    color: orange; /* Filled stars color */
  }
  .selected {
    color: orange; /* Selected stars color */
  }
  </style>
  