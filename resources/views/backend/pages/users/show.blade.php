@extends('backend.layouts.admin')
@section('title','Conto do usuários')

@section('breadcrumb')
<div class="page-header row no-gutters py-4">
	<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
		<a href="{{ route('usuarios.index') }}">
			<span class="text-uppercase page-subtitle">
				<i class="far fa-arrow-alt-circle-left"></i>Usuários
			</span>
		</a>
		<h3 class="page-title">
			Conta do usuário
		</h3>
	</div>
</div>
@endsection

@section('body')  
    
<div class="row">
    <div class="col-3">
      <div class="card card-small mb-4 pt-3">
        <div class="card-header border-bottom text-center">
          <div class="mb-3 mx-auto">
            <img class="rounded-circle" src="{{ $user->profile }}" alt="User Avatar" width="110">
          </div>
          <h4 class="mb-0">{{ $user->name }}</h4>
          <span class="text-muted d-block mb-2">[ CLASSE ]</span>
        </div>
      </div>
    </div>
    <div class="col-9">
        <div class="card card-small mb-4">
            <div class="card-body p-0">
                <b-tabs >
                    <b-tab title="Detalhes da conta" active>
                        <div class="row p-2">
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="feFirstName">Nome</label>
                                        <input type="text" class="form-control" id="feFirstName" placeholder="First Name" value="Sierra">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="feEmailAddress">Email</label>
                                        <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="sierra@example.com">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fePassword">Senha</label>
                                        <input type="password" class="form-control" id="fePassword" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fePassword">Senha</label>
                                        <input type="password" class="form-control" id="fePassword" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-tab>
                    <b-tab title="Classe e permissôes">
                    </b-tab>
                </b-tabs>
                
            </div>
            <div class="card-footer p-0">
                <div class="row p-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-sm btn-royal-blue float-right shaking"><i class="material-icons">file_copy</i> Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


@endsection
