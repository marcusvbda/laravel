import $ from 'jquery';
import vue from 'vue';
import summernote from 'summernote';
import Swal from 'sweetalert2';
window.swal = Swal;
window.summernote = summernote;
window.Vue = vue;
import VueToastr2 from 'vue-toastr-2'
import 'vue-toastr-2/dist/vue-toastr-2.min.css'
window.toastr = require('toastr')
Vue.use(VueToastr2)
Vue.component('square-overview', require('./components/dashboard/quadro-overview.vue'));
Vue.component('menu-profile', require('./components/menu-profile.vue'));
Vue.component('laravel-table', require('./components/laravel-table.vue'));