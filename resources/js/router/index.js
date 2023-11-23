import { createRouter, createWebHistory } from 'vue-router';
import Home from "../Pages/Home.vue";
import Facilities from "../Pages/Facilities.vue";
import About from "../Pages/About.vue";
import Contact from "../Pages/Contact.vue";
import Reserve from "../Pages/Reserve.vue";
import ThankYou from "../Pages/ThankYou.vue";
import Notfound from "../Pages/Notfound.vue";
import Login from '../Components/Admin/Login.vue';
import AdminDashboard from '../Pages/Admin/AdminDashboard.vue';

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
    {
      path: '/admin/dashboard',
      component: AdminDashboard,
    },
    {
      path: '/admin/login',
      component: Login,
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
    next('/admin/dashboard');
  } else if (authenticated && to.path === '/admin/login') {
    next('/admin/dashboard');
  } else {
    next();
  }
});

export default router;
