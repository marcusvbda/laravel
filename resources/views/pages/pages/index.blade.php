@extends('layouts.admin')
@section('title','Páginas do site')

@section('breadcrumb')
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Template</span>
    <h3 class="page-title">
        <span class="mr-2"><i class="fas fa-bolt"></i> Páginas do site</span>
        <a  href="{{ route('paginas.create') }}">
            <button type="button" class="mb-2 btn btn-sm btn-royal-blue mr-1">
                <i class="fa fa-plus"></i> Adicionar nova
            </button>
        </a>
    </h3>
  </div>
</div>
@endsection

@section('messages')
    @if(session('deleted'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            A página <strong> {{ session('page')->name }} </strong> foi desativada com sucesso.
        </div>
    @endif
    @if(session('added'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            A página <strong> {{ session('page')->name }} </strong> foi adicionada com sucesso.
        </div>
    @endif
@endsection

@section('body')  

    <div class="row">
        <div class="col-12">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">

                    <form method="GET" action="">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label>Ordenar por...</label>
                                <select class="custom-select" name="order_name">
                                    <option @if($filter["order_name"]=="id") selected @endif value="id">id</option>
                                    <option @if($filter["order_name"]=="name") selected @endif value="name">nome</option>
                                    <option @if($filter["order_name"]=="slug") selected @endif  value="slug">Slug text</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>Tipo da ordenação</label>
                                <select class="custom-select" name="order_type">
                                    <option @if($filter["order_type"]=="DESC") selected @endif value="DESC">Descendente</option>
                                    <option @if($filter["order_type"]=="ASC") selected @endif value="ASC">Ascendente</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <label>Filtro contendo...</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Text input with dropdown button" value="{{ $filter["filter"] }}" name="filter">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-white" type="button">
                                            <i class="fa fa-search"></i>
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">
                                    @if($filter["order_name"]=="id")
                                        @if($filter["order_type"]=="ASC")<i class="fas fa-caret-up"></i>@else<i class="fas fa-caret-down"></i>@endif
                                    @endif
                                    #
                                </th>
                                <th class="border-0">
                                    @if($filter["order_name"]=="name")
                                        @if($filter["order_type"]=="ASC")<i class="fas fa-caret-up"></i>@else<i class="fas fa-caret-down"></i>@endif
                                    @endif
                                    Name
                                </th>
                                <th class="border-0">
                                    @if($filter["order_name"]=="slug")
                                        @if($filter["order_type"]=="ASC")<i class="fas fa-caret-up"></i>@else<i class="fas fa-caret-down"></i>@endif
                                    @endif
                                    Slug text
                                </th>
                                <th class="border-0">Status</th>
                                <th class="border-0">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td>
                                        @if( $row->status=="A" )
                                            <i class="fas fa-check-circle text-success"></i> Ativa
                                        @elseif( $row->status=="I" )
                                            <i class="fas fa-ban text-danger"></i> Inativa
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('paginas.show', [ 'slug' => $row->slug]) }}">
                                            <button type="button" class="mb-2 btn btn-outline-royal-blue mr-2">
                                                <i class="fas fa-eye"></i> Visualizar
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $pages->appends(request()->query())->links() }}
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $("#menuPaginas").addClass("active");
</script>
@endsection