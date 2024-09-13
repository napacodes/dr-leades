@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.career_content') }}</h4>
                @if (isset($career_content))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('career-content.update', $career_content->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="career_id" type="hidden" value="{{ $id }}">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="summernote">{{ __('content.description') }}</label>
                                                <textarea type="text" name="description" class="form-control" id="summernote">@php echo html_entity_decode($career_content->description); @endphp</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 box-margin">
                                            <div id="accordion-">
                                                <div class="card mb-2">
                                                    <div class="card-header bg-secondary">
                                                        <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                            {{ __('content.seo_optimization') }}
                                                        </a>
                                                    </div>

                                                    <div id="accordion-1" class="collapse" data-parent="#accordion-" style="">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="meta_description">{{ __('content.meta_description') }} </label>
                                                                        <input id="meta_description" name="meta_description" type="text" class="form-control" value="{{ $career_content->meta_description }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                        <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ $career_content->meta_keyword }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header bg-secondary">
                                                        <a class="text-white" data-toggle="collapse" href="#accordion-2" aria-expanded="true">
                                                            {{ __('content.breadcrumb_customization') }}
                                                        </a>
                                                    </div>
                                                    <div id="accordion-2" class="collapse" data-parent="#accordion-" style="">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="breadcrumb_status" class="col-form-label">{{ __('content.please_use_recommended_sizes') }}</label>
                                                                        <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                                                            <option value="no" selected>{{ __('content.select_your_option') }}</option>
                                                                            <option value="yes" {{ $career_content->breadcrumb_status == 'yes' ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                                                            <option value="no" {{ $career_content->breadcrumb_status == 'no' ? 'selected' : '' }}>{{ __('content.no') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="custom_breadcrumb_image">{{ __('content.custom_breadcrumb_image') }} ({{ __('content.size') }} 1920 x 400) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                                        <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                        <small id="custom_breadcrumb_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                                                    </div>
                                                                    <div class="height-card box-margin">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="avatar-area text-center">
                                                                                    <div class="media">
                                                                                        @if (!empty($career_content->custom_breadcrumb_image))
                                                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                                                <img src="{{ asset('uploads/img/career/breadcrumb/'.$career_content->custom_breadcrumb_image) }}" alt="image" class="rounded">
                                                                                            </a>
                                                                                        @else
                                                                                            <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                                            </a>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <!--end card-body-->
                                                                            </div>
                                                                        </div>
                                                                        <!--end card-->
                                                                    </div>
                                                                    <!--end col-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                                                @if (!empty($career_content->section_image))
                                                                    <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                        <img src="{{ asset('uploads/img/career/'.$career_content->section_image) }}" alt="image" class="rounded w-25">
                                                                    </a>
                                                                @else
                                                                    <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            @if (!empty($career_content->section_image))
                                                                <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $career_content->id }}">
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
                                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#careerContentDestroyModal{{ $career_content->id }}">
                                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteImageModal{{ $career_content->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalCenterTitle" aria-hidden="true">
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
                                        <form class="d-inline-block" action="{{ route('career-content.destroy_image', $career_content->id) }}" method="POST">
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
                        <div class="modal fade" id="careerContentDestroyModal{{ $career_content->id }}" tabindex="-1" role="dialog" aria-labelledby="careerContentDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="careerContentDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('career-content.destroy', $career_content->id) }}" method="POST">
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
                                <form action="{{ route('career-content.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif

                                    <input name="career_id" type="hidden" value="{{ $id }}">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="summernote">{{ __('content.description') }}</label>
                                                        <textarea id="summernote" name="description" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 box-margin">
                                                    <div id="accordion-">
                                                        <div class="card mb-2">
                                                            <div class="card-header bg-secondary">
                                                                <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                                    {{ __('content.seo_optimization') }}
                                                                </a>
                                                            </div>

                                                            <div id="accordion-1" class="collapse" data-parent="#accordion-" style="">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="meta_description">{{ __('content.meta_description') }} </label>
                                                                                <input id="meta_description" name="meta_description" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                                <textarea id="meta_keyword" name="meta_keyword" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <a class="text-white" data-toggle="collapse" href="#accordion-2" aria-expanded="true">
                                                                    {{ __('content.breadcrumb_customization') }}
                                                                </a>
                                                            </div>
                                                            <div id="accordion-2" class="collapse" data-parent="#accordion-" style="">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="breadcrumb_status" class="col-form-label">{{ __('content.use_special_breadcrumb') }}</label>
                                                                                <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                                                                    <option value="no" selected>{{ __('content.select_your_option') }}</option>
                                                                                    <option value="yes">{{ __('content.yes') }}</option>
                                                                                    <option value="no">{{ __('content.no') }}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="custom_breadcrumb_image">{{ __('content.custom_breadcrumb_image') }} ({{ __('content.size') }} 1920 x 400) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                                                <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                                <small id="custom_breadcrumb_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                                        <button type="submit" class="btn btn-primary col-12">{{ __('content.submit') }}</button>
                                                    </div>
                                                </div>
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
