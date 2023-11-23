<template>
    <div>
      <header>
        <Navbar />
      </header>
      <div>
        <div class="headerdiv">
          <h1 class="text-3xl font-serif ml-10">MMSU FACILITY RESERVATION</h1>
          <h4 class="text-xl italic text-gray-700 font-serif ml-10">Facilities</h4>
        </div>
        <div class="quote">
          <h2 class="text-xl font-serif ml-10">"Explore Our Diverse Facilities"</h2>
        </div>

        <div class="shadow-md bg-gray-100 shadow-gray-500">
           <div class="grid grid-cols-1 gap-4 p-6 flex justify-center">
              <div v-for="(facility, index) in facilities" :key="index" class="bg-white rounded-lg shadow-md">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">{{ facility.facility_name }}</h3>
                    <p class="text-gray-600 text-justify">{{ facility.shortdes }}</p>
                    <p class="text-gray-600"><b>Location:</b> {{ facility.location }}</p>
                    <p class="text-gray-600"><b>Capacity:</b> {{ facility.capacity }}</p>
                    
                    <!-- Display prices -->
                    <div v-for="price in facility.prices" :key="price.id">
                      <p class="text-gray-600"><b>Price:</b> ₱  {{ price.amount }} per {{ price.hours }} hours</p>
                    </div>

                    <div class="mt-4 flex justify-end">
                      <router-link to="/facility-description" class="bg-green-800 hover-bg-green-700 mr-2 text-white font-semibold py-2 px-4 rounded transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300">View More</router-link>
                      <!-- <router-link to="/reservenow" class="bg-green-800 hover:bg-green-700 mr-2 text-white font-semibold py-2 px-4 rounded router-link transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300" active-class="active-link">Book Now</router-link> -->

                      <router-link :to="{ name: 'reservenow', params: { facilityId: facility.id } }"
                      class="bg-green-800 hover:bg-yellow-400 mr-2 text-white font-semibold py-2 px-4 rounded transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300"
                    active-class="active-link" @click="selectFacility(facility.id)">Book Now </router-link>
                    </div>
                </div>
              </div>
           </div>
        </div>

      </div>
        <Footer/>
    </div>
</template>

<script>

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
                facilities: [],
            };

            //for the id, nu maiclick ejy
            return {
                selectedFacilityId: null,
            };
        },
        methods: {
            loadFacilities() {
                axios.get('/list-facilities').then(response => {
                    this.facilities = response.data;
                });
            },
            //get id
            selectFacility(facilityId) {
                this.selectedFacilityId = facilityId;
            },
        },
        mounted() {
            this.loadFacilities();
        },
}
</script>


<style scoped>
.headerdiv {
  background-color: #D9D9D9;
  padding: 20px;
  text-align: left;
}
.quote {
  padding: 20px;
  text-align: center;
}
</style>