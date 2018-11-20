@extends('backend.layouts.admin')
@section('title','Conta do usuário')

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
<user-edit
	csrf="{{csrf_token()}}"
    :_user="{{$user}}">
</user-edit>

@endsection
