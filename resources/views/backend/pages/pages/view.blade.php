@extends('backend.layouts.admin')
@section('title','Página do site')

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
    <pages-view :_page="{{ $page }}"></pages-view>
@endsection