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
                    <form action="{{ route('page-builder.update', $page_builder->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            @if (($left_items != null && $page_builder->default_item != null) ||
                                 ($page_builder->default_item == null && $page_builder->is_default = 'no'))

                                @if ($page_builder->page_name == 'service-detail-show' ||
                                 $page_builder->page_name == 'service-category-index' ||
                                 $page_builder->page_name == 'team-detail-show' ||
                                 $page_builder->page_name == 'team-category-index' ||
                                  $page_builder->page_name == 'portfolio-detail-show' ||
                                  $page_builder->page_name == 'portfolio-category-index' ||
                                  $page_builder->page_name == 'portfolio-search-index' ||
                                  $page_builder->page_name == 'blog-detail-show' ||
                                  $page_builder->page_name == 'blog-category-index' ||
                                  $page_builder->page_name == 'blog-search-index'  ||
                                  $page_builder->page_name == 'blog-tag-index' ||
                                  $page_builder->page_name == 'career-detail-show' ||
                                  $page_builder->page_name == 'page-detail-show')

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="page_uri">{{ __('content.page_builder_is_not_available_on_this_page') }} <span class="text-red">*</span></label>
                                        </div>
                                    </div>

                                @else

                                    <div class="col-md-12 mb-3">
                                        <div class="easier-container">

                                            <section class="easier-dropzone source">
                                                <label for="page_uri">{{ __('content.sections') }} </label>

                                                @foreach ($left_items as $item)
                                                    <div class="easier-draggable" id="{{ $item['id'] }}" data-value="{{ $item['folder'] }}" draggable="true">
                                                        <button id="{{ $item['id'] }}" type="button" class="btn btn-sm btn-primary btn-icon move-button d-md-none" data-direction="left" style="font-size: 0.875rem; padding: 0.25rem 0.25rem;">
                                                            <i class="fas fa-chevron-left"></i> {{ __('content.move') }} <i class="fas fa-chevron-right"></i>
                                                        </button>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span>{{ $item['id'] }}</span>
                                                            <a href="#" class="link" data-target="image{{ $loop->iteration }}"><i class="fa fa-eye text-info"></i></a>
                                                        </div>
                                                        <img src="{{ asset('uploads/img/dummy/style/'.$item['id'].'.jpg') }}" id="image{{ $loop->iteration }}" class="hide" alt="{{ $item['id'] }}">
                                                    </div>
                                                @endforeach
                                                @unset($item)

                                            </section>
                                            <section class="easier-dropzone target">
                                                <label for="page_uri">{{ __('content.updated_page_sections') }} </label>
                                                <a href="#" data-toggle="modal" data-target="#defaultPageModal{{ $page_builder->id }}">
                                                    <i class="fa fa-rotate-left text-danger font-18 ml-2"></i>
                                                </a>

                                                @if ($page_builder->default_item != null || ($page_builder->default_item == null && $page_builder->updated_item != null))
                                                    @if (!empty($page_builder->updated_item))
                                                        @foreach (json_decode($page_builder->updated_item, true) as $item)
                                                            <div class="easier-draggable" id="{{ $item['id'] }}" data-value="{{ $item['folder'] }}" draggable="true">
                                                                <button id="{{ $item['id'] }}" type="button" class="btn btn-sm btn-primary btn-icon move-button d-md-none" data-direction="right" style="font-size: 0.875rem; padding: 0.25rem 0.25rem;">
                                                                    <i class="fas fa-chevron-left"></i> {{ __('content.move') }} <i class="fas fa-chevron-right"></i>
                                                                </button>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <span>{{ $item['id'] }}</span>
                                                                    <a href="#" class="link" data-target="image29{{ $loop->iteration }}"><i class="fa fa-eye text-info"></i></a>
                                                                </div>
                                                                <img src="{{ asset('uploads/img/dummy/style/'.$item['id'].'.jpg') }}" id="image29{{ $loop->iteration }}" class="hide" alt="{{ $item['id'] }}">
                                                            </div>
                                                        @endforeach
                                                        @unset($item)
                                                    @else
                                                        @foreach (json_decode($page_builder->default_item, true) as $item)
                                                            <div class="easier-draggable" id="{{ $item['id'] }}" data-value="{{ $item['folder'] }}" draggable="true">
                                                                <button id="{{ $item['id'] }}" type="button" class="btn btn-sm btn-primary btn-icon move-button d-md-none" data-direction="right" style="font-size: 0.875rem; padding: 0.25rem 0.25rem;">
                                                                    <i class="fas fa-chevron-left"></i> {{ __('content.move') }} <i class="fas fa-chevron-right"></i>
                                                                </button>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <span>{{ $item['id'] }}</span>
                                                                    <a href="#" class="link" data-target="image29{{ $loop->iteration }}"><i class="fa fa-eye text-info"></i></a>
                                                                </div>
                                                                <img src="{{ asset('uploads/img/dummy/style/'.$item['id'].'.jpg') }}" id="image29{{ $loop->iteration }}" class="hide" alt="{{ $item['id'] }}">
                                                            </div>
                                                        @endforeach
                                                        @unset($item)
                                                    @endif
                                                @endif

                                            </section>
                                        </div>
                                    </div>

                                    <input type="hidden" name="left_item" class="form-control" id="left_item" value="">

                                    <input type="hidden" name="updated_item" class="form-control" id="updated_item" value="{{ $page_builder->updated_item }}">

                                @endif

                            @else

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="page_uri">{{ __('content.page_builder_is_not_available_on_this_page') }} <span class="text-red">*</span></label>
                                    </div>
                                </div>

                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="page_uri">{{ __('content.page_uri') }} <span class="text-red">*</span></label>
                                    <input type="text" name="page_uri" class="form-control" id="page_uri" value="{{ $page_builder->page_uri }}">
                                    <small class="form-text">{{ __('segment_count') }} {{ $page_builder->segment_count }}</small>
                                    <small class="form-text">example: 1 segment usage -> about</small>
                                    <small class="form-text">example: 2 segment usage -> service/detail</small>
                                    <small class="form-text">{{ __('content.please_base_on_the_count_of_segments') }}</small>
                                </div>
                            </div>
                            @if ($page_builder->page_name == 'service-category-index' || $page_builder->page_name == 'team-category-index')
                                    <input name="breadcrumb_title" type="hidden">
                                    <input name="breadcrumb_item" type="hidden">
                            @else
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="breadcrumb_title">{{ __('content.breadcrumb_title') }} </label>
                                            <input id="breadcrumb_title" name="breadcrumb_title" type="text" class="form-control" value="{{ $page_builder->breadcrumb_title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="breadcrumb_item">{{ __('content.breadcrumb_item') }} ({{ __('content.separate_with_commas') }})</label>
                                            <textarea id="breadcrumb_item" name="breadcrumb_item" class="form-control" rows="3">{{ $page_builder->breadcrumb_item }}</textarea>
                                            <small class="form-text text-muted">{{ '<a href="#">Home</a>, Our Blogs' }}</small>
                                        </div>
                                    </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="breadcrumb_status" class="col-form-label"><a href="{{ route('breadcrumb-image.create') }}"> {{ __('content.you_can_also_activate_the_breadcrumb_image_for_all_pages_from_here') }} </a></label><br>
                                    <label for="breadcrumb_status" class="col-form-label">{{ __('content.use_special_breadcrumb') }}</label>
                                    <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                        <option value="no" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="yes" {{ $page_builder->breadcrumb_status == 'yes' ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                        <option value="no" {{ $page_builder->breadcrumb_status == 'no' ? 'selected' : '' }}>{{ __('content.no') }}</option>
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
                                                    @if (!empty($page_builder->custom_breadcrumb_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}" alt="image" class="rounded">
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
                            @if ($page_builder->page_name == 'service-category-index' || $page_builder->page_name == 'team-category-index')
                                    <input name="meta_title" type="hidden">
                            @else
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="meta_title">{{ __('content.meta_title') }} </label>
                                            <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $page_builder->meta_title }}">
                                        </div>
                                    </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">{{ __('content.meta_description') }} </label>
                                    <input id="meta_description" name="meta_description" type="text" class="form-control" value="{{ $page_builder->meta_description }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                    <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3">{{ $page_builder->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $page_builder->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $page_builder->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $page_builder->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
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
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="defaultPageModal{{ $page_builder->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultPageModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultPageModalCenterTitle">{{ __('content.update') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    {{ __('content.return_to_default_page_settings') }}
                                </div>
                                <div class="modal-footer">
                                    @if ($demo_mode == "on")
                                        <!-- Include Alert Blade -->
                                        @include('admin.demo_mode.demo-mode')
                                    @else
                                        <form class="d-inline-block" action="{{ route('page-builder.default_page_update', $page_builder->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @endif

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_apply') }}</button>
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
