<script src="{{asset('js/manifest.js')}}"></script>
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('backend/js/backend.js')}}"></script>
<script type="text/javascript">
	Vue.config.productionTip = false;
	var app = new Vue(
	{
		el: '#app',
		delimiters: ["[[","]]"],
		data : 
		{
			
		},
		methods:
		{
			
		}
	});
</script>
@yield("scripts")