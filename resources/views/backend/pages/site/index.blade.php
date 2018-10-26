@extends('backend.layouts.admin') 
@section('title','Edição do site') 
@section('breadcrumb')
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Template</span>
        <h3 class="page-title">
            <span class="mr-2"><i class="material-icons">edit</i> Edição do site</span>
        </h3>
    </div>
</div>
@endsection
 
@section('body')
<form action="{{ route('site.edit',['id'=>$site->id]) }}" method="post">
    <div class="row">
        <div class="col-9">

            <div class="row">
                <div class="col-12">
                    <div class="card card-small">
                        <div class="card-header border-bottom p-2">
                            <h6 class="m-0">Registro</h6>
                        </div>
                        <div class="card-body">
                
                            
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Titulo do site</label>
                                <div class="col-10">
                                    @csrf
                                    <input type="text" class="form-control" value="{{ $site->title }}" name="title">
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">
                    <i class="fas fa-bars"></i> Menu
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-small">
                        <div class="card-header border-bottom p-2">
                            <button type="button" class="btn btn-sm btn-royal-blue float-left">
                                <i class="fa fa-plus"></i> Adicionar item ao menu
                            </button>
                        </div>
                        <div class="card-body">
                             
                            <i class="fa fa-remove text-danger"></i>
                            <div class="form-group row">
                                <div class="col-1">
                                    <button type="button" class="mb-2 btn btn-sm btn-danger mr-1">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control" value="email@example.com">
                                </div>
                                <div class="col-4">
                                    <select class="form-control"></select>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-3">
            <div class="card card-small mb-3">
                <div class="card-header border-bottom p-2">
                    <h6 class="m-0">Ações</h6>
                </div>
                <div class="card-body p-0">
                    <div class="row p-2">
                        <div class="col-12">
                            <a  href="{{ route('site.index') }}" >
                                <button type="button" type="button" class="btn btn-sm btn-outline-danger ml-auto">
                                    Cancelar alterações
                                </button>
                            </a>
                            <button type="submit" class="btn btn-sm btn-royal-blue float-right"><i class="material-icons">file_copy</i> Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</form>
@endsection
