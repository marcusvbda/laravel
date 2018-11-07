<template>
	<div class="row">
		<i  v-show="loading" class="fa fa-spinner fa-spin"></i>
		<div class="col-8">
			<!-- Add New Post Form -->
			<div class="card card-small mb-3">
				<div class="card-body">
					<form class="add-new-post" v-on:submit.prevent="submit" >
						<div class="form-group row">
							<label class="col-2 col-form-label">Nome</label>
							<div class="col-10">
								<input class="form-control"  placeholder="Nome da post..."  type="text" v-model="post.name" >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Título</label>
							<div class="col-10">
								<input class="form-control"  placeholder="Titulo da post..."  type="text" v-model="post.title" >
							</div>
						</div>
						<vue-summernote ref="description"></vue-summernote>
					</form>
				</div>
			</div>
			
		</div>
		<div class="col-4">


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
								<select class="custom-select" name="status" v-model="post.status">
									<option value="A">Ativa</option>
									<option value="I">Inativa</option>
								</select>
							</div>
						</div>
					</div>
					<div class="card-footer p-0">
						<div class="row p-2">
							<div class="col-12">
								<button type="button" @click="submit" class="btn btn-sm btn-royal-blue float-right shaking">
									<i class="material-icons">file_copy</i> Salvar
								</button>
							</div>
						</div>
					</div>

				</div>
			</div>

			<vue-categories ref="categories" 
				:_categories="_categories" >
			</vue-categories>


		</div>
	</div>
</template>

<script>
	export default 
	{
		props: ["_categories"],
		data: function () {
			return {
				post :
				{
					title:null,
					name:null,
					description:null,
					status:"A"
				}
			}
		},
		methods:
		{
			submit()
			{
				var data = this.post;
				data.categories = this.$refs.categories.value();
				data.description = this.$refs.description.value();
				this.$http.post("",data)
				.then(function(response)
				{
					response = response.data;
					if(!response.success)
					{
						return this.$toastr.error(response.message);
					}
					return window.location.href=response.data;
				}.bind(this))
				.catch(function(error)
				{
					return this.makeError(error);
				}.bind(this));
			}
		}
	}
</script>