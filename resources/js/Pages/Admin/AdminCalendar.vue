<template lang="">
    <div class="flex flex-row w-full"><!--Main-->
      <aside class="sticky top-0 shadow-lg shadow-gray-500 w-80 h-screen"><!--Side Nav-->
           
        <div class="flex items-center justify-center h-14 mt-20">
             <img src="\src\mmsu-logo.png" alt="Logo" class="w-36" />
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
  
        <div class="bg-gray-100 shadow-xl h-screen w-full" style="overflow: auto"><!--Content-->
              <div class="grid grid-cols-1 flex flex-row border-b-4 border-yellow-400"><!--Sub Nav-->
                  <div class="shadow-md h-20 flex justify-start" style="background-color: #0C4B05">
                      <span class="flex items-center text-white text-xl font-semibold ml-4" style="font-family: Advantage">
                        <lord-icon src="https://cdn.lordicon.com/wmlleaaf.json" trigger="hover" colors="primary:#ffffff" class="w-10 h-10 mr-2" />
                        Calendar
                    </span>
  
              </div>
            </div> <!--Sub Nav End-->
          
  
      <!-- Calendar -->
      <div class="p-5 mt-9">
        <div id="calendar"></div>
      </div> 
                   
        </div><!--Content End-->
    </div>
  
    
  </template>
  
  <script>
  import { Calendar } from '@fullcalendar/core';
  import dayGridPlugin from '@fullcalendar/daygrid';
  import axios from 'axios';
  
  export default {
    data() {
      return {
        events: [],
      };
    },
    methods: {
      
    },
    mounted() {
    const calendarEl = document.getElementById('calendar');
    this.calendar = new Calendar(calendarEl, {
      plugins: [dayGridPlugin],
      initialView: 'dayGridMonth',
      events: this.events, 
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,listWeek' 
      },
      weekNumbers: true,
    });
    this.calendar.render();
  
    axios.get('/api/reservations')
    .then(response => {
      if (Array.isArray(response.data)) {
        // Process the received data
        this.events = response.data.map(reservation => ({
          title: reservation.nameEvent,
          start: reservation.eventDateFrom,
          end: reservation.eventDateTo,
        }));
        
        // Update the calendar with fetched events
        this.calendar.removeAllEvents();
        this.calendar.addEventSource(this.events);
      } else {
        console.error('Invalid data format: Unable to process the response.');
      }
    })    
    .catch(error => {
      console.error('Error fetching reservations:', error);
    });
  }
  
  
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
  
    #calendar {
  width: 1100px; 
  height: 550px; 
  margin: 0 auto; 
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
  
  .fc-prev-button,
  .fc-next-button,
  .fc-today-button {
    background-color: green; /* Set the background color */
    color: white; /* Set the text color */
    border: none; /* Remove the default button border */
    border-radius: 5px; /* Optional: Add border-radius for a rounded look */
    padding: 5px 10px; /* Optional: Adjust padding for button size */
    margin-right: 5px; /* Optional: Adjust margin between buttons */
  }
  
  /* Style for hovered FullCalendar buttons */
  .fc-prev-button:hover,
  .fc-next-button:hover,
  .fc-today-button:hover {
    background-color: darkgreen; /* Set the background color on hover */
    /* You can adjust other styles on hover as needed */
  }
  </style>