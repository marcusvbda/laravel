<template>
<div class="row">
	<div class="col-8">
		<!-- Add New Post Form -->
		<div class="card card-small mb-3">
			<div class="card-body">
				<form class="add-new-post">
					<input class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Title">
					<vue-summernote></vue-summernote>
				</form>
			</div>
		</div>
		<!-- / Add New Post Form -->
	</div>
	<div class="col-4">

		<vue-categories ref="categories" :_categories="_categories" _store_route="_store_route"></vue-categories>

		<div class="card card-small mb-3">
			<div class="card-header border-bottom">
				<h6 class="m-0">Extras</h6>
			</div>
			<div class="card-body p-0">
				
				<div class="row p-2">
					<div class="col-12">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text">Status</label>
							</div>
							<select class="custom-select" name="status">
								<option value="A">Ativa</option>
								<option value="I">Inativa</option>
							</select>
						</div>
					</div>
				</div>
				<div class="card-footer p-0">
					<div class="row p-2">
						<div class="col-12">
							<button type="button" @click="teste" class="btn btn-sm btn-royal-blue float-right shaking"><i class="material-icons">file_copy</i> Salvar</button>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
</template>

<script>
	export default 
	{
		props: ["_categories","_store_route"],
		data: function () {
			return {
				
			}
		},
		methods:
		{
			teste()
			{
				// this.page.content = $(this.$refs.content.$refs.editor).summernote('code');
				// this.$http.post(this._create_route,this.page)
				// .then(function(response)
				// {
				// 	response = response.data;
				// 	if(!response.success)
				// 	{
				// 		return this.$toastr.error(response.message);
				// 	}
				// 	window.location.href=response.data;
				// }.bind(this))
				// .catch(function(error)
				// {
				// 	return this.makeError(error);
				// }.bind(this));
			}
		}
	}
</script>