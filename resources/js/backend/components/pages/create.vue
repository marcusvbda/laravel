<template>
	<div>
		<form v-on:submit.prevent="submit">
			<div class="row">
				<div class="col-9">
					<div class="card card-small mb-3">
						<div class="card-body">

							<div class="form-group row">
								<label class="col-2 col-form-label">Nome</label>
								<div class="col-10">
									<input class="form-control" name="name" placeholder="Nome da página..."  type="text" v-model="page.name">
								</div>
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">Título</label>
								<div class="col-10">
									<input class="form-control" name="title" type="text" placeholder="Título da página..." v-model="page.title">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<vue-summernote ref="content" v-bind:_content="page.content"></vue-summernote>
								</div>
							</div>

						</div>
					</div>
				</div>


				<div class="col-3">
					<div class="card card-small mb-3">
						<div class="card-header border-bottom p-2">
							<h6 class="m-0">Extras</h6>
						</div>
						<div class="row p-2">
							<div class="col-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="customSelect01">Status</label>
									</div>
									<select class="custom-select" id="customSelect01" name="status" v-model="page.status">
										<option value="A">Ativa</option>
										<option value="I">Inativa</option>
									</select>
								</div>
							</div>
						</div>
						<hr class="m-2">
						<div class="card-body p-0">
							<div class="row p-2">
								<div class="col-12">
									<button type="submit" class="btn btn-sm btn-royal-blue float-right shaking"><i class="material-icons">file_copy</i> Salvar</button>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</form>
	</div>
</template>

<script>
	export default 
	{
		props: ["_create_route"],
		data: function () {
			return {
				page:
				{
					name    : null,
					title   : null,
					content : null,
					status  : "A"
				}
			}
		},
		methods:
		{
			submit()
			{
				this.page.content = $(this.$refs.content.$refs.editor).summernote('code');
				this.$http.post(this._create_route,this.page)
				.then(function(response)
				{
					response = response.data;
					if(!response.success)
					{
						return this.$toastr.error(response.message);
					}
					window.location.href=response.data;
				}.bind(this))
				.catch(function(error)
				{
					return this.makeError(error);
				}.bind(this));
			}
		}
	}
</script>