@extends('backend.layouts.admin')
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
        <div class="col-9">
            <div class="card card-small mb-3">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nome</label>
                        <div class="col-10">
                            <input class="form-control" name="name" placeholder="Nome da página..." type="text" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Título</label>
                        <div class="col-10">
                            <input class="form-control" name="title" type="text" placeholder="Título da página..." value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <textarea style="display:none;" name="content" id="content">
                                {{ old('content') }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-small mb-3">
                <div class="card-header border-bottom p-2">
                    <h6 class="m-0">Extras & Ações</h6>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="customSelect01">Status</label>
                            </div>
                            <select class="custom-select" id="customSelect01" name="status">
                                <option value="A" selected>Ativa</option>
                                <option value="I">Inativa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="m-2">
                <div class="card-body p-0">
                    <div class="row p-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-royal-blue float-right shaking"><i class="material-icons">file_copy</i> Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $("#content").summernote(
    {
        height: 300,
        popover: {},
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
</script>
@endsection