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
import VueSweetalert2 from 'vue-sweetalert2';
import BootstrapVue from 'bootstrap-vue';
import vue2Dropzone from 'vue2-dropzone';


Vue.use(BootstrapVue);
window.toastr = require('toastr');
Vue.use(VueToastr2);
Vue.use(VueResource);
Vue.component('vue-dropzone',vue2Dropzone);
Vue.component('square-overview', require('./components/dashboard/quadro-overview.vue'));
Vue.component('menu-profile', require('./components/menu-profile.vue'));
Vue.component('site-edit', require('./components/site/site-edit.vue'));
Vue.component('vue-summernote', require('./components/vue-summernote.vue'));
Vue.component('pages-view', require('./components/pages/page-view.vue'));
Vue.component('pages-create', require('./components/pages/page-create.vue'));
Vue.component('datatable',require("./components/datatable.vue"));
Vue.component('vue-categories',require("./components/vue-categories.vue"));
Vue.component('post-create',require("./components/posts/post-create.vue"));
Vue.component('post-view',require("./components/posts/post-view.vue"));
Vue.component('vue-gallery',require("./components/gallery/gallery.vue"));




Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;
Vue.prototype.$swal = {
	confirm(title,text,theme,callback)
	{
		swal(
		{
			title: title,
			text: text,
			type: theme,
			showCancelButton: true,
			confirmButtonText: 'Sim',
			cancelButtonText: 'Não',
			showCloseButton: false,
		}).then((result) => {
			if(result.value)
			{
				callback(result);
			}
		});
	},
	input(title,text,theme,callback,opt={})
	{
		if(!opt.type)
			opt.type = "text";
		if(!opt.placeholder)
			opt.placeholder = "";
		if(!opt.inputValue)
			opt.inputValue = "";
		swal(
		{
			title: title,
			text: text,
			type: theme,
			inputValue: opt.inputValue,
			inputPlaceholder: opt.placeholder,
			input: opt.type,
			showCancelButton: true,
			confirmButtonText: 'Continuar',
			cancelButtonText: 'Cancelar',
			showCloseButton: false,
			showLoaderOnConfirm: true,
			preConfirm: (result) =>
			{
				callback(result);
			}
		});
	},
	simple(text)
	{
		swal(text);
	}
};

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