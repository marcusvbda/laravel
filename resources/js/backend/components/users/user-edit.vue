<style>
  .el-upload__input
  {
      display:none;
  }
  .profileImage {
    width:120px;
    height:120px;
    object-fit: cover
}
</style>
<template>
<form v-on:submit.prevent="submit()">
    <div class="row">
        <div class="col-3">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
            <div class="mb-3 mx-auto">
                <el-upload
                    class="avatar-uploader" 
                    action=""
                    :headers="{ 'X-CSRF-TOKEN': csrf}"
                    :show-file-list="false"
                    :on-success="handleAvatarSuccess">
                    <img v-if="!newImage" :src="user.profile" class="rounded-circle profileImage">
                    <img v-else :src="newImage" class="rounded-circle profileImage">
                </el-upload>
            </div>
            <h4 class="mb-0">{{ user.name }}</h4>
            <span class="text-muted d-block mb-2">[ Nivel de acesso ]</span>
            </div>
        </div>
        </div>
        <div class="col-9">
            <div class="card card-small">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Detalhes da conta</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row pr-3">
                        <label class="col-2 col-form-label text-right">Nome</label> 
                        <input placeholder="Nome do usuário..." type="text" v-model="user.name" class="col-9 text-left form-control">
                    </div>
                    <div class="form-group row pr-3">
                        <label class="col-2 col-form-label text-right">Sobrenome</label> 
                        <input placeholder="Sobrenome do usuário..." type="text" v-model="user.lastname" class="col-9 text-left form-control">
                    </div>
                    <div class="form-group row pr-3">
                        <label class="col-2 col-form-label text-right">Email</label> 
                        <input placeholder="Email do usuário..." type="email" v-model="user.email"  class="col-9 text-left form-control">
                    </div>
                    <div class="form-group row pr-3" v-if="(old_email!=user.email)">
                        <label class="col-2 col-form-label text-right">Confirme o email</label> 
                        <input placeholder="Confirme o email do usuário..." type="email" v-model="confirm_email"  class="col-9 text-left form-control"  :required="(old_email!=user.email)">
                    </div>
                    <div class="form-group row pr-3">
                        <label class="col-2 col-form-label text-right">Nível de acesso</label> 
                        <select class="col-9 text-left form-control"></select>
                    </div>
                </div>
                <div class="card-footer pt-3 text-right">
                    <button type="submit" class="btn btn-sm btn-royal-blue float-right shaking"><i class="material-icons">file_copy</i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
</template>

<script>
	export default 
	{
		props: ["_user","csrf"],
		data: function () {
			return {
				user:this._user,
                confirm_email:null,
                old_email:this._user.email,
                newImage : null,
			}
		},
		mounted()
		{
			console.log(this.user);
		},
		methods:
		{
            handleAvatarSuccess(res, file) {
                this.newImage = res.data.thumbnail;
                this.user.profileImage = this.newImage;
            },
			submit()
			{
				this.$http.put("",this.user)
				.then(function(response)
				{
					response = response.data;
					if(!response.success)
					{
						return this.$toastr.error(response.message);
					}
					return window.location.reload();
				}.bind(this))
				.catch(function(error)
				{
					return this.makeError(error);
				}.bind(this));
			}
		}
	}
</script>