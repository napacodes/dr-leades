@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.external_url') }}</h4>
                @if (isset($external_url))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('external-url.update', $external_url->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_name">{{ __('content.button_name') }}</label>
                                    <input type="text" name="button_name" class="form-control" id="button_name" value="{{ $external_url->button_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_url">{{ __('content.button_url') }}</label>
                                    <input type="text" name="button_url" class="form-control" id="button_url" value="{{ $external_url->button_url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#externalUrlDestroyModal{{ $external_url->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </div>
                        </div>
                    </form>

                        <!-- Modal -->
                        <div class="modal fade" id="externalUrlDestroyModal{{ $external_url->id }}" tabindex="-1" role="dialog" aria-labelledby="externalUrlDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="externalUrlDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('external-url.destroy', $external_url->id) }}" method="POST">
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
                                    <form action="{{ route('external-url.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_name">{{ __('content.button_name') }}</label>
                                    <input type="text" name="button_name" class="form-control" id="button_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_url">{{ __('content.button_url') }} </label>
                                    <input type="text" name="button_url" class="form-control" id="button_url">
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
