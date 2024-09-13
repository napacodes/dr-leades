@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_page') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                        <input id="title" name="title" type="text" class="form-control" value="{{ $page->title }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summernote">{{ __('content.description') }}</label>
                                        <textarea id="summernote" name="description" class="form-control">@php echo html_entity_decode($page->description); @endphp</textarea>
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
                                                                <input id="title" name="meta_description" type="text" class="form-control" value="{{ $page->meta_description }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ $page->meta_keyword }}</textarea>
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
                                                                    <option value="yes" {{ $page->breadcrumb_status == 'yes' ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                                                    <option value="no" {{ $page->breadcrumb_status == 'no' ? 'selected' : '' }}>{{ __('content.no') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="custom_breadcrumb_image">{{ __('content.custom_breadcrumb_image') }} ({{ __('content.size') }} 1920 x 400) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                                <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                <small id="custom_breadcrumb_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                            </div>
                                                            <div class="height-card box-margin">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="avatar-area text-center">
                                                                            <div class="media">
                                                                                @if (!empty($page->custom_breadcrumb_image))
                                                                                    <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                                        <img src="{{ asset('uploads/img/blog/breadcrumb/'.$page->custom_breadcrumb_image) }}" alt="image" class="rounded">
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
                                        <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 600 x 400) (.svg, .jpg, .jpeg, .png, .webp)</label>
                                        <input type="file" name="section_image" class="form-control-file" id="section_image">
                                        <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($page->section_image))
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/page/'.$page->section_image) }}" alt="blog image" class="rounded w-25">
                                                            </a>
                                                        @else
                                                            <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @if (!empty($page->section_image))
                                                        <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $page->id }}">
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
                                        <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                        <select class="form-control" name="image_status" id="image_status">
                                            <option value=show" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="show" {{ $page->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                            <option value="hide" {{ $page->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="{{ $page->order }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="published" {{ $page->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                            <option value="draft" {{ $page->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteImageModal{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="messageModalCenterTitle">{{ __('content.delete') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                </div>
                                <div class="modal-footer">
                                    <form class="d-inline-block" action="{{ route('page.destroy_image', $page->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                        <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
