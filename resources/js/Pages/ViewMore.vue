<template>
  <div>
    <header>
      <Navbar />
      
    </header>
    <div class="headerdiv">
      <button @click.prevent="goBack" class="mr-2 bg-green-700 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded ml-10">Go Back</button>
    </div>

    <div>
      <h1>INSERT CAROUSEL HERE OR WHATEVER HAHA</h1>
    </div>
    
         
    <div class="shadow-md bg-white shadow-gray-500">
      <div class="grid grid-cols-1 gap-4 p-6 flex justify-center">
        <!-- First Row -->
        <div class="bg-light-green rounded-lg shadow-md p-4">
          <h1 class="font-bold font-serif text-2xl uppercase">{{ facility.facility_name }}</h1>
          <p class="italic mb-4 "> <b>LOCATION: </b>{{ facility.location }}</p>
          <div class="description-text">
            <p class="mb-4">{{ facility.description }}</p>
          </div>
        </div>

        <!-- Second Row with Two Separate Cards -->
         <!-- Second Row with Two Separate Cards -->
         <div class="flex justify-between gap-6">
          <!-- First Card -->
          <div class="w-1/2 bg-white rounded-lg shadow-md p-4 shadow-around">
            <h3 class="font-bold mb-2">Highlights/Key Features</h3>
            <div class="tags-section">
              <div class="tags-container text-l">
                <div v-for="(tag, index) in tagsArray" :key="index" class="tag-box">
                  {{ tag }}
                </div>
              </div>
            </div>
          </div>

          <!-- Second Card -->
          <div class="w-1/2 bg-white rounded-lg shadow-md p-4 shadow-around">
            <h3 class="font-bold mb-2">Rental Price</h3>
            <div class="price-container">
              <div v-for="price in facilityPrices" :key="price.id" class="price">
                <p class="text-green-600">
                  <span v-if="price.timePeriod === 1">
                    <i class="fas fa-sun text-yellow-500"></i> <!-- Sun icon for daytime -->
                    <span class="ml-1">DAY TIME:</span>
                  </span>
                  <span v-else-if="price.timePeriod === 2">
                    <i class="fas fa-moon text-indigo-500"></i> <!-- Moon icon for nighttime -->
                    <span class="ml-1">NIGHT TIME:</span>
                  </span>
                  ₱ {{ price.amount }} per {{ price.hours }} hours
                </p>
              </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    <Footer />
  </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.min.css';
import Footer from '../Components/Footer.vue';
import Navbar from '../Components/Navbar.vue';
import axios from 'axios';

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      facility: {},
      facilityPrices: [],
      tagsArray: [],
    };
  },
  methods: {
    goBack() {
      // Redirect to /facilities when canceled
      this.$router.push('/facilities');
    },
    loadFacilityDetails() {
      const facilityId = this.$route.params.facilityId;

      // Get the current month (assuming it's 1-12)
      const currentMonth = new Date().getMonth() + 1;

      axios.get(`/list-facilities/${facilityId}`).then(response => {
        this.facility = response.data;
        this.tagsArray = JSON.parse(this.facility.tags.replace(/'/g, '"')); // Convert string representation to array
      });

      axios.get(`/facility-pricing/${facilityId}`).then(response => {
        // Filter prices for the current month
        const prices = response.data;
        this.facilityPrices = prices.filter(price => {
          return (
            (price.monthFrom <= currentMonth && price.monthTo >= currentMonth) ||
            price.monthTo === null // Include prices that are indefinite
          );
        });
      });
    },
  },
  mounted() {
    this.loadFacilityDetails();
  },
};
</script>

<style scoped>
.headerdiv {
  background-color: #dedede;
  padding: 20px;
  text-align: left;
}

.bg-light-green {
  background-color: #EDFFE7; /* Light green color */
}

.description-text {
  max-width: 95%;
  margin-left: auto;
  margin-right: auto;
}

/* Style for tags */
.tags-section {
  margin-top: 20px; 
}

.tags-container {
  display: flex;
  flex-wrap: wrap;
  /* justify-content: center; 
  align-items: center; 
  margin-top: 10px;  */
}

.tag-box {
  background-color: #E2E8F0; 
  padding: 5px 10px;
  margin-right: 10px; 
  margin-bottom: 10px; 
  border-radius: 5px;

  /* Add more styling as desired */
}

.shadow-around {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.price {
  flex: 0 0 48%;
}

.tags-and-prices {
  display: flex;
}

.tags-column,
.prices-column {
  flex: 1;
}


.prices-column {
  flex: 1;
}

.separator {
  width: 20px; /* Adjust the width as needed */
}
</style>
