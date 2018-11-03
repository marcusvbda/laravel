<style>
.listCategories
{
	max-height: 200px;
	overflow: scroll;
}
</style>
<template>
	<div>
		<div class="card card-small mb-3">
			<div class="card-header border-bottom">
				<h6 class="m-0">Categorias</h6>
			</div>
			<div class="card-body p-0">
				<ul class="list-group list-group-flush">
					<li class="list-group-item px-3 pb-2 listCategories">

						<b-form-checkbox-group ref="categories" v-model="categories">
							<template v-for="(category,i) in categoryList">
								<p class="mb-1">
									<b-form-checkbox class="item" :value="category.id">{{ category.name }}</b-form-checkbox>
									<a class="float-right link" v-if="(categories.includes(category.id)&&(primary!=category.id))" @click="primary=category.id"> Tornar primario</a>
									<b class="float-right link" v-if="(categories.includes(category.id)&&(primary==category.id))">Primário</b>
								</p>
								<p v-for="sub in category.sub_categories" class="mb-1 pl-4">
									<b-form-checkbox  :value="sub.id">{{ sub.name }}</b-form-checkbox>
									<a class="float-right link" v-if="(categories.includes(sub.id)&&(primary!=sub.id))" @click="primary=sub.id"> Tornar primario</a>
									<b class="float-right link" v-if="(categories.includes(sub.id)&&(primary==sub.id))">Primário</b>
								</p>
							</template>
						</b-form-checkbox-group>
						

					</li>

					<form  v-on:submit.prevent="addCategory">
						<div class="row p-2">
							<div class="col-12">
								<div class="input-group">
									<select class="custom-select col-4" v-model="newCategorytype">
										<option value="pai">Pai</option>
										<option value="filho">Filho</option>
									</select>
									<input type="text" class="form-control col-8"  v-model="newCategory.name" :placeholder="'Nova categoria '+this.newCategorytype" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-white px-2" type="submit" ><i class="material-icons">add</i></button>
									</div>
								</div>
							</div>
						</div>
						<div class="row p-2" v-if="newCategorytype=='filho'">
							<div class="col-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text">Categoria pai</label>
									</div>
									<select class="custom-select" v-model="newCategory.parent"  ref="parentCategory">
										<template v-for="(category,i) in categoryList">
											<option :value="category.id">{{ category.name }}</option>
										</template>
									</select>
								</div>
							</div>
						</div>
					</form>

				</ul>
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
				categories: [],
				newCategorytype:"pai",
				categoryList:this._categories,
				primary:null,
				newCategory:
				{
					name:null,
					parent:null,
				}
			}
		},
		methods:
		{
			set(array,primary)
			{
				this.categories = array;
				this.primary = primary;
			},
			value()
			{
				return {
					selected : this.categories,
					primary:this.primary
				};
			},
			addCategory()
			{
				if((this.newCategorytype=='filho')&&(!this.newCategory.parent))
				{
					this.$refs.parentCategory.focus();
					return this.$toastr.error("Selecione a categoria pai");
				}

				this.$http.post(this._store_route,this.newCategory)
				.then(function(response)
				{
					response = response.data;
					if(!response.success)
					{
						return this.$toastr.error(response.message);
					}
					this.categoryList = response.data;
					this.newCategorytype = "pai";
					this.newCategory.name = null;
					this.newCategory.parent = null;
					return this.$toastr.success("Categoria adicionada com sucesso");

				}.bind(this))
				.catch(function(error)
				{
					return this.makeError(error);
				}.bind(this));
			}
		}
	}
</script>