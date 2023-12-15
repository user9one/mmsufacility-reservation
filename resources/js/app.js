require('./bootstrap');

import { createApp } from 'vue';
import App from './Components/App.vue';
import Navbar from './Components/Navbar.vue';
import Footer from './Components/Footer.vue'
import ImageCarousel from './Components/ImageCarousel.vue'
import AdminNavbar from './Components/Admin/AdminNavbar.vue';
import AdminFooter from './Components/Admin/AdminFooter.vue';
import AdminDashboard from './Pages/Admin/AdminDashboard.vue';
import Addfacilities from './Components/Admin/Addfacilities.vue';
import ReviewForm from './Components/ReviewForm.vue';
import FacilityImageSlider from './Components/FacilityImageSlider.vue';


import '../css/app.css';
import router from "./router"


import VueSplide from '@splidejs/vue-splide';
import CKEditor from '@ckeditor/ckeditor5-vue';


const app = createApp(App);
app.use(router);
app.component('Navbar', Navbar);
app.component('Footer', Footer);
app.component('ImageCarousel', ImageCarousel);
app.component('AdminNavbar', AdminNavbar);
app.component('AdminFooter', AdminFooter);
app.component('AdminDashboard', AdminDashboard);
app.component('Addfacilities', Addfacilities);
app.component('ReviewForm', ReviewForm);
app.component('RowCarousel', FacilityImageSlider);
app.mount('#app');
app.use(CKEditor);

app.use( VueSplide );


app.mixin({
  data() {
    return {
      authenticated: window.authenticated,
    };
  },
});