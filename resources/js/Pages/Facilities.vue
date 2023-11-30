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
        <div
          v-for="(facility, index) in facilities"
          :key="index"
          class="bg-white rounded-lg shadow-md grid grid-cols-3 gap-4"
        >
          <!-- Image Carousel -->
          <div class="col-span-1">
            <!-- Your image carousel goes here -->
            <p>Image Carousel</p>
          </div>

          <!-- Facility Info -->
          <div class="col-span-1 p-4">
            <h3 class="text-xl font-semibold">{{ facility.facility_name }}</h3>
            <p class="text-gray-600 text-justify">{{ facility.shortdes }}</p>
            <p class="text-gray-600"><b>Location:</b> {{ facility.location }}</p>
            <p class="text-gray-600"><b>Capacity:</b> {{ facility.capacity }}</p>
            
          </div>

          <!-- Prices & Buttons -->
          <div class="col-span-1 p-4">
            <!-- <h3 class="text-lg font-semibold">Prices</h3> -->
            <div v-for="price in facility.prices" :key="price.id" >
              <p class="text-gray-600 mt-5">

                ₱ {{ price.amount }} per {{ price.hours }} hours

                <span v-if="price.timePeriod === 1">
                    <span class="ml-1">(DAY TIME)</span>
                    <span class="ml-2"> <!-- Adding margin here -->
                      <i class="fas fa-sun text-yellow-500"></i> <!-- Sun icon for nighttime -->
                    </span>
                  </span>
                  <span v-else-if="price.timePeriod === 2">
                    <span class="ml-1">(NIGHT TIME)</span>
                    <span class="ml-2"> <!-- Adding margin here -->
                      <i class="fas fa-moon text-indigo-500"></i> <!-- Moon icon for nighttime -->
                    </span>
                  </span>
                </p>
            </div>
            <br>

            <div class="mt-2 flex flex-col space-y-2">
              <router-link
                :to="{ name: 'viewmore', params: { facilityId: facility.id } }"
                class="bg-green-800 hover:bg-green-700 text-white font-semibold py-1 px-3 rounded transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 hover:duration-300 text-sm"
              >
                View More
              </router-link>

              <router-link
                :to="{ name: 'reservenow', params: { facilityId: facility.id } }"
                class="bg-green-800 hover:bg-yellow-400 text-white font-semibold py-1 px-3 rounded transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 hover:duration-300 text-sm"
                active-class="active-link"
                @click="selectFacility(facility.id)"
              >
                Book Now
              </router-link>
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
                tagsArray: [],
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