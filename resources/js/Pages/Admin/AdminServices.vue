<template lang="">
    <div class="flex flex-row w-full"><!--Main-->
      <aside class="sticky top-0 shadow-lg shadow-gray-500 w-80 h-screen"><!--Side Nav-->
            
        <div class="flex items-center justify-center h-14 mt-20">
           <img src="/src/mmsu logo.png" alt="Logo" class="w-36" />
        </div>
            <div class="grid grid-cols-1 mt-20">
                <router-link to="/admin/admindashboard" class="block px-4 py-2 text-gray-800 router-link" trigger="hover" active-class="active-link">
                      <span class="flex items-center">
                          <lord-icon src="https://cdn.lordicon.com/wmwqvixz.json" trigger="morph" state="morph-home-3" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Dashboard
                      </span>
                  </router-link>
                  <router-link to="/admin/admincalendar" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                      <span class="flex items-center">
                          <lord-icon src="https://cdn.lordicon.com/wmlleaaf.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Calendar
                      </span>
                  </router-link> 
                  <router-link to="/admin/adminreservation" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                      <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/omiqopzf.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Reservation 
                      </span>
                  </router-link>
                  <router-link to="/admin/adminfacilities" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                      <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/ipnwkgdy.json"  trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Facilities 
                      </span>
                  </router-link>
                  <router-link to="/admin/adminservices" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                      <span class="flex items-center">
                          <lord-icon src="https://cdn.lordicon.com/iazmohzf.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Services 
                      </span>
                  </router-link>                 
                  <router-link to="/admin/adminreport" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                      <span class="flex items-center">
                          <lord-icon src="https://cdn.lordicon.com/yrbmguoo.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Report 
                      </span>
                  </router-link> 
                  <router-link to="/admin/login" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                      <span class="flex items-center">
                          <lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                          Logout 
                      </span>
                  </router-link>
            </div>
        </aside><!--Side Bav End-->
  
        <div class="bg-gray-100 shadow-xl h-screen w-full"  style="font-family: Advantage"><!--Content-->
            <div class="grid grid-cols-1 flex flex-row border-b-4 border-yellow-400"><!--Sub Nav-->
                <div class="shadow-md h-20 flex justify-start" style="background-color: #0C4B05">
                    <span class="flex items-center text-white text-xl font-semibold ml-4">
                        <img src="\Icons\Services.gif" alt="Services Icon"  class="w-10 h-10 mr-2" />
                        Services
                    </span>
                </div>
            </div> <!--Sub Nav End--> 
  
  
            <div class="m-8">
  <form @submit.prevent="addService" class="flex flex-col space-y-4"  style="font-family: Advantage">
    <div class="flex flex-row space-x-4">
      <div class="w-1/3">
        <label class="block text-gray-700 font-semibold" for="service-name">Service Name</label>
        <input
          v-model="serviceName"
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-800"
          type="text"
          id="service-name"
          name="service-name"
          placeholder="Enter service name"
          required
        />
      </div>
      <div class="w-1/3">
        <label class="block text-gray-700 font-semibold" for="service-type">Type</label>
        <select
          v-model="serviceType"
          id="service-type"
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-800"
        >
          <option value="Equipment">Equipment</option>
          <option value="Food">Food</option>
          <!-- Add other types as needed -->
        </select>
      </div>
      <div class="w-1/3">
        <label class="block text-gray-700 font-semibold" for="service-fee">Fee</label>
        <input
          v-model="serviceFee"
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-800"
          type="number"
          id="service-fee"
          name="service-fee"
          placeholder="Enter service fee"
          required
        />
      </div>
    </div>
  
    <div class="flex flex-row space-x-4">
      <div class="w-1/2">
        <label class="block text-gray-700 font-semibold" for="month-from">Month From</label>
        <select
          v-model="monthFrom"
          id="month-from"
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-800"
        >
          <option v-for="(month, index) in months" :key="index" :value="index + 1">{{ month }}</option>
        </select>
      </div>
      <div class="w-1/2">
        <label class="block text-gray-700 font-semibold" for="month-to">Month To</label>
        <select
          v-model="monthTo"
          id="month-to"
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-800"
        >
          <option v-for="(month, index) in months" :key="index" :value="index + 1">{{ month }}</option>
        </select>
      </div>
     
          </div>
  
          <button
  type="submit"
  class="bg-green-800 hover:bg-green-700 text-white px-4 py-2 rounded focus-outline-none focus-ring-2 focus-ring-green-500 mx-auto transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 hover:duration-300 "
  >
  Add Service
  </button>
        </form>
      </div>
  
      <!-- Display the result in a table -->
      <div class="m-8">
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-gray-200">
        <th class="px-4 py-2 text-center border">Service Name</th>
        <th class="px-4 py-2 text-center border">Type</th>
        <th class="px-4 py-2 text-center border">Fee</th>
        <th class="px-4 py-2 text-center border">Month From</th>
        <th class="px-4 py-2 text-center border">Month To</th>
        <!-- <th class="px-4 py-2 text-center border">Actions</th> -->
      </tr>
    </thead>
    <tbody>
      <tr v-for="(service, index) in services" :key="index" :class="index % 2 === 0 ? 'bg-gray-100' : 'bg-white'">
        <td class="px-4 py-2 text-center border">{{ service.name }}</td>
        <td class="px-4 py-2 text-center border">{{ service.type }}</td>
        <td class="px-4 py-2 text-center border">{{ service.fee }}</td>
        <td class="px-4 py-2 text-center border">{{ getMonthName(service.monthFrom) }}</td>
        <td class="px-4 py-2 text-center border">{{ getMonthName(service.monthTo) }}</td>
        <!-- <td class="px-4 py-2 text-center border">
    <button @click="deleteService(service.id)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
      Delete
    </button>
  </td> -->
      </tr>
    </tbody>
  </table>
  </div>  
    </div>
  
  </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
  data() {
    return {
      isSidePanelOpen: true,
      showModal: false,
      serviceName: "",
      serviceType: "",
      serviceFee: "",
      monthFrom: "",
      monthTo: "",
      services: [],
      months: [
        'January', 'February', 'March', 'April',
        'May', 'June', 'July', 'August',
        'September', 'October', 'November', 'December'
      ],
    };
  },
  
  methods: {
    toggleSidePanel() {
      this.isSidePanelOpen = !this.isSidePanelOpen;
    },
    topenModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
    addService() {
      this.services.push({
        name: this.serviceName,
        type: this.serviceType,
        fee: this.serviceFee,
        monthFrom: this.monthFrom,
        monthTo: this.monthTo,
      });
  
      this.serviceName = "";
      this.serviceType = "";
      this.serviceFee = "";
      this.monthFrom = "";
      this.monthTo = "";
    },
  
    getMonthName(monthValue) {
      return this.months[monthValue - 1];
    },
  
    // deleteService(serviceId) {
    //   if (confirm('Are you sure you want to delete this service?')) {
    //     axios.delete(`/api/services/${serviceId}`)
    //       .then(response => {
    //         console.log('Service deleted:', response.data);
    //         this.services = this.services.filter(service => service.id !== serviceId);
    //       })
    //       .catch(error => {
    //         console.error('Error deleting service:', error);
    //       });
    //   }
    // }
  },
  };
  </script>
  
  
  <style lang="">
    
  </style>
  
  <style scoped>
  .router-link:hover {
  color: white;
  background-color: #0C4B05;
  }
  .active-link {
  color: white;
  background-color: #0C4B05;
  }
  
  /* Result Table Styles */
  .m-8 table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .m-8 th, .m-8 td {
  border: 1px solid #ddd;
  padding: 16px;
  text-align: center;
  font-size: 14px;
  }
  
  .m-8 th {
  background-color: #0C4B05;
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  }
  
  .m-8 tbody tr:nth-child(even) {
  background-color: #f8f8f8;
  }
  
  .m-8 tbody tr:hover {
  background-color: #f0f0f0;
  transition: background-color 0.3s ease;
  }
  
  /* Button Style */
  .m-8 button {
  padding: 12px 18px;
  background-color: #0C4B05;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  font-size: 14px;
  }
  
  .m-8 button:hover {
  background-color: #084104;
  }
  
  .centered-content {
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: margin 0.3s ease-in-out;
    }
  .slide-enter-active, .slide-leave-active {
  transition: transform 0.3s ease-in-out;
  
  }
  
  .slide-enter, .slide-leave-to {
  transform: translateX(-100%);
  }
  
  .transition-transform {
  transition: transform 0.3s ease-in-out;
  }
  
  .transition-margin {
  transition: margin-right 0.3s ease-in-out;
  }
  
  .slide-main-enter-active, .slide-main-leave-active {
  transition: margin-right 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
  }
  
  .slide-main-enter, .slide-main-leave-to {
  margin-right: 0;
  }
  
  
  </style>
  
  
  