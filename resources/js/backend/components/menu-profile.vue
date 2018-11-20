<style>
.profileImageMenu {
  width:40px;
  height:40px;
  object-fit: cover
}
</style>
<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="user-avatar rounded-circle mr-2 profileImageMenu" :src="image" alt="User Avatar">
            <span class="d-none d-md-inline-block">{{ username }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
            <a class="dropdown-item" target="_blank" href="/">
                <i class="material-icons">vertical_split</i> Acessar o site
            </a>
            <a class="dropdown-item" href="/admin/posts/criar">
                <i class="material-icons">note_add</i> Criar novo post
            </a>
            <a class="dropdown-item" :href="profile_route">
                <i class="material-icons"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" @click="logout">
                    <i class="material-icons text-danger"></i> Logout
                </a>
            </div>
        </li>
    </template>
    <script>
        export default 
        {
            props: ['image','username','profile_route'],
            data: function () {
              return {
            }
        },
        methods:
        {
            logout: function()
            {
                this.$swal.confirm("Confirmação","Deseja mesmo efetuar o logout? ","warning",function()
                {
                    return window.location.href ="/admin/logout";
                }.bind(this));
            }
        }
    }
</script>