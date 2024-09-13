@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.seo') }}</h4>
                @if (isset($seo))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('seo.update', $seo->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_title">{{ __('content.meta_title') }} </label>
                                    <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $seo->meta_title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">{{ __('content.meta_description') }} </label>
                                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{{ $seo->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                    <textarea name="meta_keyword" class="form-control" id="meta_keyword" rows="3">{{ $seo->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">fb_app_id</label>
                                    <input type="text" name="fb_app_id" class="form-control" id="fb_app_id" value="{{ $seo->fb_app_id }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#seoDestroyModal{{ $seo->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </div>
                        </div>
                    </form>

                        <!-- Modal -->
                        <div class="modal fade" id="seoDestroyModal{{ $seo->id }}" tabindex="-1" role="dialog" aria-labelledby="seoDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="seoDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('seo.destroy', $seo->id) }}" method="POST">
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
                                    <form action="{{ route('seo.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_title">{{ __('content.meta_title') }}</label>
                                    <input type="text" name="meta_title" class="form-control" id="meta_title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">{{ __('content.meta_description') }}</label>
                                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                    <textarea name="meta_keyword" class="form-control" id="meta_keyword" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">fb_app_id</label>
                                    <input type="text" name="fb_app_id" class="form-control" id="fb_app_id">
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
