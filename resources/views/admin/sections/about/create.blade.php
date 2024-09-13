@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.about') }}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('content.'.$style) }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                        </div>
                    </div>
                    <!-- Button -->
                    <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                    <!-- Modal -->
                    <div id="imageModal" class="border border-success iyzi-modal">
                        <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/about-'.$style.'.jpg') }}" alt="draft image">
                    </div>
                </h4>
                @if (isset($item_section))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('about.update', $item_section->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                        <input type="file" name="section_image" class="form-control-file" id="section_image">
                                        <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($item_section->section_image))
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/about/'.$item_section->section_image) }}" alt="image" class="rounded">
                                                            </a>
                                                        @else
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @if (!empty($item_section->section_image))
                                                        <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal{{ $item_section->id }}">
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
                                            <option value="youtube" {{ $item_section->video_type == 'youtube' ? 'selected' : '' }}>{{ __('content.youtube') }}</option>
                                            <option value="other" {{ $item_section->video_type == 'other' ? 'selected' : '' }}>{{ __('content.other') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="video_url">{{ __('content.video_url') }} </label>
                                        <input type="text" name="video_url" class="form-control" id="video_url" value="{{ $item_section->video_url }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_title">{{ __('content.section_title') }}</label>
                                        <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $item_section->section_title }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'section_title')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'section_title')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'section_title')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'section_title')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'section_title')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'section_title')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $item_section->title }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">{{ __('content.description') }}</label>
                                            <textarea name="description" class="form-control" id="description" rows="3">{{ $item_section->description }}</textarea>
                                            <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</small>
                                        </div>
                                    </div>
                                 <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_name">{{ __('content.button_name') }}</label>
                                            <input type="text" name="button_name" class="form-control" id="button_name" value="{{ $item_section->button_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_url">{{ __('content.button_url') }}</label>
                                            <input type="text" name="button_url" class="form-control" id="button_url" value="{{ $item_section->button_url }}">
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="button_name_2">{{ __('content.button_name_2') }}</label>
                                        <input type="text" name="button_name_2" class="form-control" id="button_name_2" value="{{ $item_section->button_name_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cv_file">{{ __('content.pdf') }}  (.pdf)</label>
                                        <input type="file" name="cv_file" class="form-control-file" id="cv_file">
                                        <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($item_section->cv_file))
                                                            <a  class="d-block mx-auto" href="{{ asset('uploads/img/about/'.$item_section->cv_file) }}" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                {{ $item_section->cv_file }}
                                                            </a>
                                                        @else
                                                            <span>{{ __('content.not_yet_created') }}</span>
                                                        @endif
                                                    </div>
                                                    @if (!empty($item_section->cv_file))
                                                        <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal2{{ $item_section->id }}">
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
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#aboutSectionDestroyModal{{ $item_section->id }}">
                                        <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
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
                                        <form class="d-inline-block" action="{{ route('about.destroy_image', $item_section->id) }}" method="POST">
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
                            <div class="modal fade" id="deleteModal2{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModal2CenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="messageModal2CenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('about.destroy_image_2', $item_section->id) }}" method="POST">
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
                        <div class="modal fade" id="aboutSectionDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="aboutSectionDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bannerSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('about.destroy', $item_section->id) }}" method="POST">
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
                                <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif

                                    <input name="style" type="hidden" value="{{ $style }}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                <input type="file" name="section_image" class="form-control-file" id="section_image">
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
                                                <label for="section_title">{{ __('content.section_title') }}</label>
                                                <input type="text" name="section_title" class="form-control" id="section_title">
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'section_title')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'section_title')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'section_title')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'section_title')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'section_title')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'section_title')">{{ __('<p>') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('content.title') }}</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</small>
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('content.description') }}</label>
                                                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</small>
                                                </div>
                                            </div>
                                         <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_name">{{ __('content.button_name') }}</label>
                                                    <input type="text" name="button_name" class="form-control" id="button_name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_url">{{ __('content.button_url') }}</label>
                                                    <input type="text" name="button_url" class="form-control" id="button_url">
                                                </div>
                                            </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="button_name_2">{{ __('content.button_name_2') }}</label>
                                                <input type="text" name="button_name_2" class="form-control" id="button_name_2">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cv_file">{{ __('content.pdf') }}  (.pdf)</label>
                                                <input type="file" name="cv_file" class="form-control-file" id="cv_file">
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

    <!-- start about feature -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-30">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center mb-20">
                            <h6 class="card-title mb-0">{{ __('content.features') }}</h6>
                            <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ {{ __('content.add_feature') }}</button>
                        </div>
                        <div class="table-responsive order-stats">
                            @if (count($features) > 0)
                                <div>
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                                    <label for="check_all">{{ __('content.all') }}</label>
                                    <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                        <i class="fa fa-trash text-danger font-18"></i>
                                    </a>
                                </div>
                                <form onsubmit="return btnCheckListGet()" action="{{ route('about.destroy_feature_checked') }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input type="hidden" id="checked_lists" name="checked_lists" value="">

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteCheckedModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.delete_selected') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table id="basic-datatable"  class="table table-striped dt-responsive w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.title') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $desc = count($features); $asc=0; @endphp
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td>
                                                <input name="check_list[]" type="checkbox" value="{{ $feature->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                            </td>
                                            <td>@php echo html_entity_decode($feature->title); @endphp</td>
                                            <td>@php echo html_entity_decode($feature->description); @endphp</td>
                                            <td>{{ $feature->order }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('about.edit_feature', $feature->id) }}" class="mr-2">
                                                        <i class="fa fa-edit text-info font-18"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('about.destroy_feature', $feature->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $feature->id }}">
                                                            <a type="button">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $feature->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                        <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>{{ __('content.not_yet_created') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">{{ __('content.add_new') }}</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('about.store_feature') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title_2">{{ __('content.title') }} </label>
                                        <input type="text" name="title" class="form-control" id="title_2">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title_2')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title_2')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title_2')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title_2')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title_2')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title_2')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description_2">{{ __('content.description') }} </label>
                                        <textarea name="description" class="form-control" id="description_2" rows="3"></textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description_2')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description_2')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description_2')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description_2')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description_2')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description_2')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="0" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <!-- end about counter -->

@endsection
