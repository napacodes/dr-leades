@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.service_info') }}</h4>
                @if (isset($service_info))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('service-info.update', $service_info->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="service_id" type="hidden" value="{{ $id }}">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                <input type="file" name="section_image" class="form-control-file" id="section_image">
                                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                            </div>
                                            <div class="height-card box-margin">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="avatar-area text-center">
                                                            <div class="media">
                                                                @if (!empty($service_info->section_image))
                                                                    <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                        <img src="{{ asset('uploads/img/service/'.$service_info->section_image) }}" alt="image" class="rounded w-25">
                                                                    </a>
                                                                @else
                                                                    <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            @if (!empty($service_info->section_image))
                                                                <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $service_info->id }}">
                                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video_type" class="col-form-label">{{ __('content.video_type') }}</label>
                                                <select class="form-control" name="video_type" id="video_type">
                                                    <option value="youtube" selected>{{ __('content.select_your_option') }} </option>
                                                    <option value="youtube" {{ $service_info->video_type == 'youtube' ? 'selected' : '' }}>{{ __('content.youtube') }}</option>
                                                    <option value="other" {{ $service_info->video_type == 'other' ? 'selected' : '' }}>{{ __('content.other') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video_url">{{ __('content.video_url') }} </label>
                                                <input type="text" name="video_url" class="form-control" id="video_url" value="{{ $service_info->video_url }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('content.title') }} </label>
                                                <input id="title" name="title" type="text" class="form-control" value="{{ $service_info->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="general-item-list">{{ __('content.item') }} </label>
                                                <input id="general-item-list" name="item" type="text" class="form-control" value="{{ $service_info->item }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#serviceInfoDestroyModal{{ $service_info->id }}">
                                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteImageModal{{ $service_info->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteImageModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('service-info.destroy_image', $service_info->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="serviceInfoDestroyModal{{ $service_info->id }}" tabindex="-1" role="dialog" aria-labelledby="serviceInfoDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="serviceInfoDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('service-info.destroy', $service_info->id) }}" method="POST">
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
                                <form action="{{ route('service-info.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif

                                    <input name="service_id" type="hidden" value="{{ $id }}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                <input id="section_image" name="section_image" type="file" class="form-control-file">
                                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video_type" class="col-form-label">{{ __('content.video_type') }}</label>
                                                <select class="form-control" name="video_type" id="video_type">
                                                    <option value="youtube" selected>{{ __('content.select_your_option') }} </option>
                                                    <option value="youtube">{{ __('content.youtube') }}</option>
                                                    <option value="other">{{ __('content.other') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video_url">{{ __('content.video_url') }} </label>
                                                <input type="text" name="video_url" class="form-control" id="video_url">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('content.title') }} </label>
                                                <input id="title" name="title" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="general-item-list">{{ __('content.item') }} </label>
                                                <input id="general-item-list" name="item" type="text" class="form-control">
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                                </div>
                                            </div>
                                    </div>


                                </form>
                            @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
