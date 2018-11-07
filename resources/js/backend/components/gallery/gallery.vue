<template>
	<div>
		<div class="modal fade" ref="modal_gallery" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body p-2">
						<h4 class="text-center">Galeria de imagens</h4>
						<div class="row">
							<div class="col-12">
								<b-tabs >
									<b-tab title="Imagens" active style="max-height: 400px;overflow: scroll;">
										<b-card no-body class="p-2" >
											<b-tabs pills card vertical>
												<b-tab title="Categoria 1" active>
													Imagens da categoria 1
												</b-tab>
												<b-tab title="Categoria 2">
													Imagens da categoria 2
												</b-tab>
												<b-tab title="Categoria 3">
													Imagens da categoria 3
												</b-tab>
											</b-tabs>
										</b-card>
									</b-tab>
									<b-tab title="Upload" style="max-height: 400px;overflow: scroll;">
										<vue-dropzone id="dropzone_gallery" ref="dropzone" :options="dropOptions"></vue-dropzone>
									</b-tab>
								</b-tabs>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
	import Vue from "vue";
	import 'vue2-dropzone/dist/vue2Dropzone.min.css'

	export default 
	{
		props: ["_id"],
		data: function () 
		{
			return {
				dropOptions: 
				{
					url: "https://httpbin.org/post"
				},
				selectedCategory : null
			}
		},
		methods:
		{
			show()
			{
				$(this.$refs.modal_gallery).modal("show");
			},
			close()
			{
				$(this.$refs.modal_gallery).modal("close");
			}
		}
	}
</script>