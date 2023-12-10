<template lang="">
    <div class="flex flex-row  w-full"><!--Main-->
      <aside class="sticky top-0 shadow-lg shadow-gray-500 w-80 h-screen"><!--Side Nav-->
            
            <div class="flex items-center justify-center h-14 mt-20">
           <img src="/mmsu logo.png" alt="Logo" class="w-36" />
        </div>
            <div class="grid grid-cols-1 mt-20">
              <router-link to="/admin/admindashboard" class="block px-4 py-2 text-gray-800 router-link" trigger="hover" active-class="active-link">
                    <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/wmwqvixz.json" trigger="morph" state="morph-home-3" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Dashboard
                    </span>
                </router-link>
                <router-link to="/admin/adminprofile" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                    <span class="flex items-center">
                      <lord-icon src="https://cdn.lordicon.com/hrjifpbq.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Profile
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
                <router-link to="/admin/adminpayment" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                    <span class="flex items-center">
                      <lord-icon src="https://cdn.lordicon.com/ncitidvz.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Payments 
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
        </aside><!--Side Nav End-->
    
        <div class="bg-gray-100 shadow-xl h-screen w-full" style="overflow: auto"><!--Content-->
            <div class="grid grid-cols-1 flex flex-row border-b-4 border-yellow-400"><!--Sub Nav-->
                <div class="shadow-md h-20 flex justify-start" style="background-color: #0C4B05">
                    <span class="flex items-center text-white text-xl font-semibold ml-4" style="font-family: Advantage">
                        <img src="\Icons\Reservation.gif" alt="Reservation Icon" class="w-10 h-10 mr-2" />
                        Reservation
                    </span>
                </div>
            </div><!-- Sub Nav End --> 
  
            <div class="shadow-md" style="overflow: auto;"><!--content Reservation-->
              <span class="text-lg font-semibold italic mt-5 ml-5" style="font-family: Advantage">
                Facility Reservation Request
              </span>
              <div class="shadow grid grid-cols-9 flex justify-items-center h-12 items-center mt-2 text-white font-semibold" style="background-color: #0C4B05">
                <span>Event Name</span>              
                <span>Event Type</span>
                <span>Facility</span>
                <span>Date</span>
                <span>Time</span>
                <span>User</span>
                <span>Status</span>
                <span>-----</span>
                <span>Action</span>
              </div>
              <div class="bg-white shadow grid grid-cols-9 flex justify-items-center h-12 items-center text-black font-normal opacity-90">
                <span>Dummy FUN</span>              
                <span>Socialization</span>
                <span>Fem Hall</span>
                <span>12/05/2018</span>
                <span>Time</span>
                <lord-icon src="https://cdn.lordicon.com/kthelypq.json" trigger="hover" class="w-10 h-10"></lord-icon>
                <div :class="[statusClass, 'hover:bg-white-200', 'text-white', 'font-semibold', 'py-2', 'px-4', 'rounded-md']">{{ status }}</div>
                <button @click="openModal" class="bg-green-800 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 ">View</button>
                <div class="space-x-1 flex justify-items-center">
                    <lord-icon  @click="approveReservation" id="aprroved" src="https://cdn.lordicon.com/oqdmuxru.json" trigger="hover" colors="primary:#0a5c15" class="w-9 h-9 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 " ></lord-icon>
                    <lord-icon @click="declineReservation" id="declined" src="https://cdn.lordicon.com/nqtddedc.json" trigger="hover" colors="primary:#c71f16" class="w-9 h-9 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 " ></lord-icon>
                </div>  
              </div>
              <!-- Modal -->
              <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center">
                <div class="overlay"></div>
                <div class="bg-gray-200 w-1/2 h-1/2 rounded-md shadow-lg border-y-4 border-green-800">
                    <!-- Modal content goes here -->
                    <div class="flex justify-end">
                        <lord-icon src="https://cdn.lordicon.com/zxvuvcnc.json" trigger="hover" colors="primary:#0c4b05"
                         @click="closeModal" class="w-8 h-8 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 rounded-md"></lord-icon>
                    </div>
                    <!--Content Na-->
                    <div class="grid grid-cols-2 gap-14 m-5 text-lg font-semibold" style="font-family: Calibri">
                        <div class="">Facility Name: Dummy UI</div>
                        <div class="">Description:</div>
                        <div class="">Location:</div>
                        <div class="">Capacity:</div>
                        <div class="">Amount:</div>
                        <div class="">Month From:</div>
                        <div class="">Month To:</div>
                        <div class="">Hours:</div>
                        <div class="">Price:</div>
                        <div class="">-----</div>
                    </div>
                    <!--Content End-->
                </div>
              </div>
            <!-- Modal End -->       
            </div><!--Content Reservation End-->        
        </div><!--Content End-->
    </div>
  </template>
  <script>
  export default {
    data() {
      return {
        
        isSidePanelOpen: true,
        showModal: false,
        status: 'Pending',
        notification: null,
      };
    },
    methods: {

    showNotification(message, statusClass) {
    this.notification = { message, statusClass};
    setTimeout(() => {
      this.notification = null;
    }, 3000); // Hide the notification after 3 seconds (adjust as needed)
  },
    approveReservation() {
    this.status = 'Approved';
    this.showNotification('Reservation Approved!', 'notification-success');
    },
    declineReservation() {
    this.status = 'Declined';
    this.showNotification('Reservation Declined!', 'notification-error');
    },
    toggleSidePanel() {
      this.isSidePanelOpen = !this.isSidePanelOpen;
    },
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
    },
    computed: {
    statusClass() {
    return {
      'bg-yellow-500': this.status === 'Pending',
      'bg-green-800': this.status === 'Approved',
      'bg-red-700': this.status === 'Declined',
      // Add more conditions for other statuses if needed
    };
  },
},
  };
  </script>
  
  <style lang="">
  /* Add any additional styles for the modal here */
  </style>
  
  <style scoped>
  /* ... (your existing styles) */
  /* Side Navigation Hover Effect Panel */
  .router-link:hover {
    color: white;
    background-color: #0C4B05;
  }
  .active-link {
    color: white;
    background-color: #0C4B05;
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
.overlay {
    position: fixed;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value for transparency */
    z-index: -1; /* Push the overlay behind the modal */
  }
  .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: #4caf50; /* Green background color */
    color: white;
    border-radius: 5px;
    z-index: 1;
  }

  .notification-success {
    background-color: #4caf50; /* Green background color for success */
    color: white;
  }

  .notification-error {
    background-color: #de1900; /* Red background color for error */
    color: white;
  }
  </style>