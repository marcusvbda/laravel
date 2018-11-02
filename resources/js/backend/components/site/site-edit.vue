<template>
	<div>
		
		<form v-on:submit.prevent="submit()">
			<div class="row">
				<div class="col-9">

					<div class="row">
						<div class="col-12">
							<div class="card card-small">
								<div class="card-header border-bottom p-2">
									<h6 class="m-0">Registro</h6>
								</div>
								<div class="card-body">


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label">Titulo do site</label>
										<div class="col-10">
											<input type="text" class="form-control" v-model="site.title" >
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
						<span class="text-uppercase page-subtitle">
							<i class="fas fa-bars"></i> Menu
						</span>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-small">
								<div class="card-header border-bottom p-2">
									<button type="button" class="btn btn-sm btn-royal-blue float-right" @click="addMenu()">
										<i class="fa fa-plus"></i> Adicionar item ao menu
									</button>
								</div>
								<div class="card-body">

									<i class="fa fa-remove text-danger"></i>
									<div class="form-group row">
										<template v-for="(menu,i) in site.menus">
											<div class="col-1"> 
												<button type="button" @click="eraseMenu(i)" class="mb-2 btn btn-sm btn-danger mr-1">
													<i class="fas fa-times-circle"></i>
												</button>
											</div>
											<div class="col-7">
												<input type="text" class="form-control" v-model="site.menus[i].name" >
											</div>
											<div class="col-4">
												<select class="form-control" v-model="site.menus[i].page_id" required>
													<option value="0" selected>Início</option>
													<template v-for="page in pages" >
														<option :value="page.id">{{ page.name }}</option>
													</template>
												</select>
											</div>
										</template>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-3">
					<div class="card card-small mb-3">
						<div class="card-header border-bottom p-2">
							<h6 class="m-0">Ações</h6>
						</div>
						<div class="card-body p-0">
							<div class="row p-2">
								<div class="col-12">
									<a  href="#" >
										<button type="button" @click="cancel()"  class="btn btn-sm btn-outline-danger ml-auto">
											Cancelar alterações
										</button>
									</a>
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
		props: ["_site","_pages","_menus"],
		data: function () {
			return {
				method:this._method,
				action:this._action,
				pages: this._pages,
				site: this._site
			}
		},
		mounted()
		{
			this.site.menus = this._menus;
		},
		methods:
		{
			eraseMenu(index)
			{
				this.site.menus.splice(index,1);
			},
			addMenu()
			{
				this.site.menus.push({page_id:null,name:null});
			},
			cancel()
			{
				this.$swal.confirm("Confirmação","Deseja mesmo alterações?","warning",function()
				{
					return window.location.reload();
				});
			},
			submit()
			{
				this.$http.put(this.site.edit_route,this.site)
				.then(function(response)
				{
					response = response.data;
					if(!response.success)
					{
						return this.$toastr.error(response.message);
					}
					return this.$toastr.success("Site atualizado com sucesso");
				}.bind(this))
				.catch(function(error)
				{
					return this.makeError(error);
				}.bind(this));
			}
		}
	}
</script>