@if(session('quick.alert'))
    <div class="alert alert-{{ session('quick.alert.type') }} alert-dismissible fade show mb-0" role="alert">
        @if(session('quick.alert.closeable'))
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-check mx-2"></i>
        @endif
        {!! session('quick.alert.message') !!}
    </div>
@endif
