@extends('layouts.admin') 
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
    <square-overview title="Posts" value="2,390"></square-overview>
    <square-overview title="Pages" value="182"></square-overview>
    <square-overview title="Coments" value="8,147"></square-overview>
</div>
@endsection
 

@section("scripts")
<script>
    $("#menuDashboard").addClass("active");
</script>
@endsection