require('./bootstrap');

import { createApp } from 'vue';
import App from './Components/App.vue';
import Navbar from './Components/Navbar.vue';
import Footer from './Components/Footer.vue'
import Carousel from './Components/Carousel.vue'
import AdminNavbar from './Components/Admin/AdminNavbar.vue';
import AdminFooter from './Components/Admin/AdminFooter.vue';
import AdminDashboard from './Pages/Admin/AdminDashboard.vue';
import Addfacilities from './Components/Admin/Addfacilities.vue'
import '../css/app.css';
import router from "./router"

import  VueCarousel from 'vue-carousel';

import CKEditor from '@ckeditor/ckeditor5-vue';


const app = createApp(App);
app.use(router);
app.component('Navbar', Navbar);
app.component('Footer', Footer);
app.component('Carousel', Carousel);
app.component('AdminNavbar', AdminNavbar);
app.component('AdminFooter', AdminFooter);
app.component('AdminDashboard', AdminDashboard);
app.component('Addfacilities', Addfacilities);

app.mount('#app');
app.use(CKEditor);

app.use(VueCarousel); // Use VueCarousel as a plugin


app.mixin({
  data() {
    return {
      authenticated: window.authenticated,
    };
  },
});