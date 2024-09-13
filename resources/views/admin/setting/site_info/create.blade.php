@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.site_info') }}</h4>
            @if (isset($site_info))
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('site-info.update', $site_info->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }}</label>
                                        <input type="text" name="description" class="form-control" id="description" value="{{ $site_info->description }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="copyright">{{ __('content.copyright') }}</label>
                                        <input type="text" name="copyright" class="form-control" id="copyright" value="{{ $site_info->copyright }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'copyright')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'copyright')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'copyright')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'copyright')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'copyright')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'copyright')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#siteInfoDestroyModal{{ $site_info->id }}">
                                        <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="siteInfoDestroyModal{{ $site_info->id }}" tabindex="-1" role="dialog" aria-labelledby="siteInfoDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="siteInfoDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('site-info.destroy', $site_info->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                            @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('site-info.store') }}" method="POST">
                                    @csrf
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">{{ __('content.description') }}</label>
                                                <input type="text" name="description" class="form-control" id="description">
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="copyright">{{ __('content.copyright') }}</label>
                                                <input type="text" name="copyright" class="form-control" id="copyright">
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'copyright')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'copyright')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'copyright')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'copyright')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'copyright')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'copyright')">{{ __('<p>') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
