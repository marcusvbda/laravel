import $ from 'jquery';
import vue from 'vue';
import summernote from 'summernote';
import Swal from 'sweetalert2';
window.swal = Swal;
window.summernote = summernote;
window.Vue = vue;
Vue.component('square-overview', require('./components/dashboard/quadro-overview.vue'));
Vue.component('menu-profile', require('./components/menu-profile.vue'));