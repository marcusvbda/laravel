@extends('backend.layouts.admin')
@section('title','Páginas do site')

@section('breadcrumb')
<div class="page-header row no-gutters py-4">
	<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
		<span class="text-uppercase page-subtitle">Blog</span>
		<h3 class="page-title">
			<span class="mr-2"><i class="material-icons">note_add</i> Postagens</span>
			<a  href="{{ route('paginas.create') }}">
				<button type="button" class="mb-2 btn btn-sm btn-royal-blue mr-1">
					<i class="fa fa-plus"></i> Adicionar nova
				</button>
			</a>
		</h3>
	</div>
</div>
@endsection

@section('body')  

<div class="row">
	<div class="col-12">

		<div class="card card-small mb-4">  

			<div class="card-body p-0 pb-0 text-center">



			</div>
		</div>
	</div>
</div>
@endsection
