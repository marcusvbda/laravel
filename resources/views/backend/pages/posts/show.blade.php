@extends('backend.layouts.admin')
@section('title','Editar postagem')

@section('breadcrumb')
<div class="page-header row no-gutters py-4">
	<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
		<a href="{{ route('posts.index') }}">
			<span class="text-uppercase page-subtitle">
				<i class="far fa-arrow-alt-circle-left"></i>Postagens do site
			</span>
		</a>
		<h3 class="page-title">
			Editar postagem
		</h3>
	</div>
</div>
@endsection

@section('body')  
	<post-view
		:_post="{{ $post }}" 
		:_categories="{{ $categories }}" 
		_route_store_categories="{{ route('categorias.store') }}"
	>
	</post-view>
@endsection
