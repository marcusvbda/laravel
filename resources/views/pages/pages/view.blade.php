@extends('layouts.admin')
@section('title','Página do site')

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
    @if(session('updated'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            A página <strong> {{ session('page')->name }} </strong> foi altualizada com sucesso.
        </div>
    @endif
@endsection

@section('breadcrumb')
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <a href="{{ route('paginas.index') }}">
        <span class="text-uppercase page-subtitle">
            <i class="far fa-arrow-alt-circle-left"></i>Páginas do site
        </span>
    </a>
    <h3 class="page-title">
        {{ $page->name }}
    </h3>
  </div>
</div>
@endsection
@section('body')  
<form method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post">
                        <div class="form-group row">
                            <label for="exhibition_name" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" id="exhibition_name" value="{{ $page->name }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
        <!-- Post Overview -->
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">
            <h6 class="m-0">Ações</h6>
            </div>
            <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex px-3">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="customSelect01">Status</label>
                      </div>
                      <select class="custom-select" id="customSelect01" name="status">
                        <option value="A" @if( $page->status == "A") selected @endif>Ativa</option>
                        <option value="I" @if( $page->status == "I") selected @endif>Inativa</option>
                      </select>
                    </div>
                </li>
                <li class="list-group-item d-flex px-3">
                    <a  href="#" data-toggle="modal" data-target="#deleteModal">
                        <button type="button" type="button" class="btn btn-sm btn-outline-danger ml-auto">
                            Excluir
                        </button>
                    </a>
                    <button type="submit" class="btn btn-sm btn-royal-blue ml-auto"><i class="material-icons">file_copy</i> Alterar</button>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>
</form>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir ?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				A págide do site <b>{{ $page->name }}</b> será excluida.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<a href="{{ route('paginas.deactivate', [
					'slug' => $page->slug
				]) }}" class="btn btn-danger">Excluir página do site</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById("menuPaginas").classList.add('active');
</script>
@endsection