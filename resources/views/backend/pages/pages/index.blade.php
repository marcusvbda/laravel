@extends('backend.layouts.admin')
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

@section('body')  

<div class="row">
    <div class="col-12">

        <div class="card card-small mb-4">  

            <div class="card-header border-bottom pb-0">
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Seu filtro aqui..." value="{{ $filter }}" name="filter">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-white">
                                        <i class="fa fa-search"></i>
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body p-0 pb-0 text-center">
                <Datatable _table_class="table" _thead_class="bg-light">
                    <template slot="thead">
                        <tr>
                            <td>Nome</td>
                            <td>Url</td>
                            <td>Status</td>
                            <td class="no-sort" width="1%"></td>
                        </tr>
                    </template>
                    <template slot="tbody">
                        @foreach($pages as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td><a target="_blank" href="{{ $row->url }}">{{ $row->url }}</a></td>
                            <td>
                                @if( $row->status=="A" )
                                <i class="fas fa-check-circle text-success"></i> Ativa
                                @elseif( $row->status=="I" )
                                <i class="fas fa-ban text-danger"></i> Inativa
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('paginas.show', [ 'slug' => $row->slug]) }}">
                                    <button type="button" class="btn btn-sm btn-outline-royal-blue">
                                        <i class="fas fa-eye"></i> Visualizar
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </template>
                </Datatable>

            </div>

        </div>
        <div class="float-right">
            {{ $pages->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
