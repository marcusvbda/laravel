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
            A página <strong> {{ session('page')->name }} </strong> foi atualizada com sucesso.
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
        <div class="col-9">
            <div class="card card-small mb-3">
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nome</label>
                        <div class="col-10">
                            <input class="form-control" name="name" placeholder="Nome da página..."  type="text" value="{{ $page->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Título</label>
                        <div class="col-10">
                            <input class="form-control" name="title" type="text"  value="{{ $page->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <textarea style="display:none;" name="content" id="content">
                                {!! $page->content !!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-small mb-3">
                <div class="card-header border-bottom p-2">
                    <h6 class="m-0">Extras</h6>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <small><i class="fas fa-globe"></i> <a title="Acessar página" href="{{ asset($page->slug) }}" target="_blank">{{ asset($page->slug) }}</a></small>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="customSelect01">Status</label>
                            </div>
                            <select class="custom-select" id="customSelect01" name="status">
                                <option value="A" @if( $page->status == "A") selected @endif>Ativa</option>
                                <option value="I" @if( $page->status == "I") selected @endif>Inativa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="m-2">
                <div class="card-body p-0">
                    <div class="row p-2">
                        <div class="col-12">
                            <a  href="#" data-toggle="modal" data-target="#deleteModal">
                                <button type="button" type="button" class="btn btn-sm btn-outline-danger ml-auto">
                                    Excluir
                                </button>
                            </a>
                            <button type="submit" class="btn btn-sm btn-royal-blue float-right"><i class="material-icons">file_copy</i> Alterar</button>
                        </div>
                    </div>
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
				A página do site <b>{{ $page->name }}</b> será excluida.
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
    $("#content").summernote(
    {
        height: 300,
        popover: {}
    });
</script>
@endsection