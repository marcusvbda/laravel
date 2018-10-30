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
<site-edit
    _action="{{ route('site.edit',['id'=>$site->id]) }}"
    _title="{{ $site->title }}"
    _pages="{{ json_encode($pages) }}"
    _menus="{{ $site->menus }}"
>

</site-edit>
@endsection
