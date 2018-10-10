@extends('layouts.admin')
@section('title','Criar páginas do site')

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
    <a href="{{ route('paginas.index') }}">
        <span class="text-uppercase page-subtitle">
            <i class="far fa-arrow-alt-circle-left"></i>Páginas do site
        </span>
    </a>
    <h3 class="page-title">
        Criar página do site
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
                                <input class="form-control" name="name" type="text" id="exhibition_name" value="{{ old('name') }}">
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
                        <option value="A" selected>Ativa</option>
                        <option value="I">Inativa</option>
                      </select>
                    </div>
                </li>
                <li class="list-group-item d-flex px-3">
                    <button type="submit" class="btn btn-sm btn-royal-blue ml-auto"><i class="material-icons">file_copy</i> Salvar</button>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    document.getElementById("menuPaginas").classList.add('active');
</script>
@endsection