import $ from 'jquery';
import vue from 'vue';
import summernote from 'summernote';
import Swal from 'sweetalert2';
window.swal = Swal;
window.summernote = summernote;
window.Vue = vue;
import VueToastr2 from 'vue-toastr-2'
import VueResource from 'vue-resource'
import 'vue-toastr-2/dist/vue-toastr-2.min.css'
window.toastr = require('toastr')
Vue.use(VueToastr2)
Vue.use(VueResource);
Vue.component('square-overview', require('./components/dashboard/quadro-overview.vue'));
Vue.component('menu-profile', require('./components/menu-profile.vue'));
Vue.component('laravel-table', require('./components/laravel-table.vue'));
Vue.component('site-edit', require('./components/site/site-edit.vue'));
Vue.component('summernote', require('./components/summernote.vue'));


Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

Vue.mixin({
  
  methods:{
    makeError(error)
    {
      var errors = error.body.errors;
      for(var row in errors)
      {
       this.$toastr.error(errors[row].join("<br>"));
     }
   }
 }
});