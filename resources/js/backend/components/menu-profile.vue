<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="user-avatar rounded-circle mr-2" :src="image" alt="User Avatar">
            <span class="d-none d-md-inline-block">Sierra Brooks</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
            <a class="dropdown-item" href="user-profile-lite.html">
            <i class="material-icons"></i> Profile</a>
            <a class="dropdown-item" href="components-blog-posts.html">
            <i class="material-icons">vertical_split</i> Blog Posts</a>
            <a class="dropdown-item" href="add-new-post.html">
            <i class="material-icons">note_add</i> Add New Post</a>
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
    props: ['routelogout','image'],
    data: function () {
      return {
        _routelogout: this.routelogout,
      }
    },
    methods:
    {
        logout: function()
        {
            var self = this;
            helper.confirm("Confirmação","Deseja mesmo efetuar o logout? ","warning",function()
            {
                return window.location.href = self.routelogout;
            });
        }
    }
}
</script>