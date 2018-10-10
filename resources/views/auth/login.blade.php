@extends('layouts.empty')
@section('title','Login')
@section('content')
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-check mx-2"></i>
        Usuário e/ou senha incorretos
    </div>
@endif
<br>
<body class="h-100" cz-shortcut-listen="true">
   <div class="container-fluid icon-sidebar-nav h-100">
      <div class="row h-100">
         <main class="main-content col">
            <div class="main-content-container container-fluid px-4 my-auto h-100">
               <div class="row no-gutters h-100">
                  <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                     <div class="card">
                        <div class="card-body">
                           <img class="auth-form__logo d-table mx-auto mb-3" src="{{ url('/') }}/images/logo.png" alt="Shards Dashboards - Register Template">
                           <h5 class="auth-form__title text-center mb-4">Acesse sua conta</h5>
                           <form  method="post" action="{{ route('login')}}">
                               @csrf
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Email</label>
                                 <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Digite o seu email" name="email" id="email">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Senha</label>
                                 <input type="password" class="form-control" placeholder="Senha" name="password" id="password" >
                              </div>
                              <div class="form-group mb-3 d-table mx-auto">
                                 <div class="custom-control custom-checkbox mb-1">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                    <label class="custom-control-label" for="remember">Mantenha-me logado</label>
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Login</button>
                           </form>
                        </div>
                     </div>
                     <div class="auth-form__meta d-flex mt-4">
                        <a href="forgot-password.html">Esqueceu a senha ?</a>
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </div>
   </div>
</body>
@endsection