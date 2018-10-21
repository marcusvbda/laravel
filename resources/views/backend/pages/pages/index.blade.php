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
            <laravel-table 
                :collumns="[['#','id',true],['Nome','name',true],['Slug text','slug',true],['Status','status',true],['Ações','acoes']]"
                order_name="{{$filter['order_name']}}"
                order_type="{{$filter['order_type']}}"
                filter="{{ $filter["filter"] }}"
                filter_placeholder="Filtro contendo ..."
            >
                <template slot="tbody">
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
                </template>
                <template slot="pagination">
                    {{ $pages->appends(request()->query())->links() }}
                </template>
            </laravel-table>
        </div>
    </div>
@endsection
