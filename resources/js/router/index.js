import { createRouter, createWebHistory } from 'vue-router';
import Home from "../Pages/Home.vue";
import Facilities from "../Pages/Facilities.vue";
import ViewMore from "../Pages/ViewMore.vue";
import About from "../Pages/About.vue";
import Contact from "../Pages/Contact.vue";
import Reserve from "../Pages/Reserve.vue";
import ThankYou from "../Pages/ThankYou.vue";
import Notfound from "../Pages/Notfound.vue";

//-------------------Admin --------------------//
import Login from '../Components/Admin/Login.vue';
import AdminDashboard from "../Pages/Admin/AdminDashboard.vue"
import Addfacilities from "../Components/Admin/Addfacilities.vue"
import AdminFacilities from "../Pages/Admin/AdminFacilities.vue"
import AdminCalendar from "../Pages/Admin/AdminCalendar.vue"
import AdminReservation from "../Pages/Admin/AdminReservation.vue"
// import AdminProfile from "../Pages/Admin/AdminProfile.vue"
// import AdminPayment from "../Pages/Admin/AdminPayment.vue"
import AdminReport from "../Pages/Admin/AdminReport.vue"
import Pic from "../Components/Admin/Pic.vue"
import AdminServices from "../Pages/Admin/AdminServices.vue"
import EditFacilities from "../Components/Admin/EditFacilities.vue"



const router = createRouter({
  history: createWebHistory("/"),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: "/about",
      name: "about",
      component: About
    },
    {
      path: "/contact",
      name: "contact",
      component: Contact
    },
    {
      path: "/facilities",
      name: "facilities",
      component: Facilities
    },
    {
      path: "/reservenow/:facilityId", // Add the facilityId parameter
      name: "reservenow",
      component: Reserve,
      beforeEnter: (to, from, next) => {
        // Check if the facilityId is set
        if (!to.params.facilityId) {
          // Redirect back to facilities if no facility is selected
          next('/facilities');
        } else {
          // Continue with the navigation
          next();
        }
      },
      props: true, // Allow route.params as props in the component

    },
    {
      path: '/viewmore/:facilityId',
      name: 'viewmore',
      component: ViewMore,
    },
    {
      path: '/thank-you',
      name: 'thank-you',
      component: ThankYou,
    },

    
    {
      path: '/not-found',
      name: 'NotFound',
      component: Notfound,
    },
    {
      path: '/:pathMatch(.*)*',
      redirect: '/not-found'
    },


    // --------- ADMIN ---------

    {
      path: '/admin/login',
      name: '/adminlogin',
      component: Login,
    },
    {
      path: '/admin/admindashboard',
      name: 'admindashboard',
      component: AdminDashboard
    },
    {
      path: '/admin/adminfacilities',
      name: 'adminfacilities',
      component: AdminFacilities
    },
    {
      path: '/addfacilities',
      name: 'addfacilities',
      component: Addfacilities
    },
    {
      path: '/admin/admincalendar',
      name: 'admincalendar',
      component: AdminCalendar
    },
    {
      path: '/admin/adminreservation',
      name: 'adminreservation',
      component: AdminReservation
    },

    // {
    //   path: '/admin/adminprofile',
    //   name: 'adminprofile',
    //   component: AdminProfile
    // },

    // {
    //   path: '/admin/adminpayment',
    //   name: 'adminpayment',
    //   component: AdminPayment
    // },

    {
      path: '/admin/adminreport',
      name: 'adminreport',
      component: AdminReport
    },

    {
      path: '/pic/:facilityId',
      name: 'pic',
      component: Pic
    },
    
    {
      path: '/admin/adminservices',
      name: 'adminservices',
      component: AdminServices
    },

    {
      path: '/editfacilities/:id', 
      name: 'EditFacilities',
      component: EditFacilities, 
    },


  ]
});


router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some((record) => record.meta.requiresAuth);
  const requiresGuest = to.matched.some((record) => record.meta.requiresGuest);
  const authenticated = window.authenticated;

  if (requiresAuth && !authenticated) {
    next('/admin/login');
  } else if (requiresGuest && authenticated) {
    next('/admin/admindashboard');
  } else if (authenticated && to.path === '/admin/login') {
    next('/admin/admindashboard');
  } else {
    next();
  }
});

export default router;
