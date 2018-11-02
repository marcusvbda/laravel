@extends('backend.layouts.admin') 
@section('title','Dashboard') 
@section('breadcrumb')
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Informativo</span>
        <h3 class="page-title">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </h3>
    </div>
</div>
@endsection
 
@section('body')

 
<div class="row">
    <div class="col-3">
        <square-overview title="Postagens" value="{{ $pages->count() }}" route="{{ route('posts.index') }}"></square-overview>
    </div>
    <div class="col-3">
        <square-overview title="Páginas" value="{{ $pages->count() }}" route="{{ route('paginas.index') }}"></square-overview>
    </div>
</div>
@endsection
 

@section("scripts")
<script>
    $("#menuDashboard").addClass("active");
</script>
@endsection