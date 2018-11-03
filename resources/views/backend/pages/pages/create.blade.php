@extends('backend.layouts.admin')
@section('title','Criar páginas do site')


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
    <pages-create 
        _create_route="{{ route('paginas.store') }}">
    </pages-create>
@endsection
