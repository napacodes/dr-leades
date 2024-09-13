@if(Auth::user())
    @can('page builder check')
        <div class="fixed-page-builder-btn">
            <a href="{{ route('page-builder.edit', $page_builder->id) }}" class="btn btn-icon page-builder-btn">
                <i class="fa fa-edit text-white"></i> {{ __('content.page_builder') }}
            </a>
        </div>
    @endcan
@endif
