@extends('backend.layouts.admin')
@section('title','Criar postagem')

@section('messages')
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<i class="fa fa-check mx-2"></i>
	{{ $errors->first() }}
</div>
@endif
@endsection

@section('breadcrumb')
<div class="page-header row no-gutters py-4">
	<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
		<a href="{{ route('posts.index') }}">
			<span class="text-uppercase page-subtitle">
				<i class="far fa-arrow-alt-circle-left"></i>Postagens do site
			</span>
		</a>
		<h3 class="page-title">
			Criar postagem
		</h3>
	</div>
</div>
@endsection

@section('body')  
	<post-create 
		:_categories="{{ $categories }}" 
		_route_store_categories="{{ route('categorias.store') }}"
	>
	</post-create>
@endsection
