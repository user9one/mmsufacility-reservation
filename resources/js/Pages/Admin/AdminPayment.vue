<template lang="">
    <div class="flex flex-row w-full"><!--Main-->
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
        </aside><!--Side Bav End-->
      
            <div class="bg-gray-100 shadow-xl h-screen w-full"><!--Content-->
            <div class="grid grid-cols-1 flex flex-row border-b-4 border-yellow-400"><!--Sub Nav-->
                <div class="shadow-md h-20 flex justify-start" style="background-color: #0C4B05">
                    <span class="flex items-center text-white text-xl font-semibold ml-4"  style="font-family: Advantage">
                        <img src="\Icons\Payments.gif" alt="Payments Icon"  class="w-10 h-10 mr-2" />
                        Payments
                    </span>
                </div>
            </div> <!--Sub Nav End--> 

            
        </div><!--Content End-->
       
    </div>
    


    
</template>
<script>
export default {
  
}
    
</script>
<style lang="">
    
</style>

<style scoped>
/* Side Navigation Hover Effect Panel */
.router-link:hover {
      color: white;
      background-color: #0C4B05; 
    } 
.active-link {
      color: white;
      background-color: #0C4B05; 
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