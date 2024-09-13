@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.banner') }}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('content.'.$style) }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('banner.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                            <a class="dropdown-item" href="{{ route('banner.create', ['style' => 'style2']) }}">{{ __('content.style2') }}</a>
                            <a class="dropdown-item" href="{{ route('banner.create', ['style' => 'style3']) }}">{{ __('content.style3') }}</a>
                            <a class="dropdown-item" href="{{ route('banner.create', ['style' => 'style4']) }}">{{ __('content.style4') }}</a>
                        </div>
                    </div>
                    <!-- Button -->
                    <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                    <!-- Modal -->
                    <div id="imageModal" class="border border-success iyzi-modal">
                        <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/banner-'.$style.'.jpg') }}" alt="draft image">
                    </div>
                </h4>
                @if (isset($item_section))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('banner.update', $item_section->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                @if ($style == 'style1' || $style == 'style2' || $style == 'style3')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }}
                                            @if ($style == 'style1' || $style == 'style2') 354 x 354) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style3' || $style == 'style4') 1920 x 1080) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @endif
                                        </label>
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
                                                                <img src="{{ asset('uploads/img/banner/'.$item_section->section_image) }}" alt="image" class="rounded">
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
                                @endif
                                @if ($style == 'style3')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_image_2">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 1080) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                            <input type="file" name="section_image_2" class="form-control-file" id="section_image_2">
                                            <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($item_section->section_image_2))
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/banner/'.$item_section->section_image_2) }}" alt="image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        @if (!empty($item_section->section_image_2))
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
                                        <div class="form-group">
                                            <label for="section_image_3">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 1080) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                            <input type="file" name="section_image_3" class="form-control-file" id="section_image_3">
                                            <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($item_section->section_image_3))
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/banner/'.$item_section->section_image_3) }}" alt="image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        @if (!empty($item_section->section_image_3))
                                                            <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal3{{ $item_section->id }}">
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
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $item_section->title }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }}</label>
                                        <textarea name="description" class="form-control" id="description" rows="3">{{ $item_section->description }}</textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                    @if ($style == 'style4')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="youtube_video_url">{{ __('content.youtube_video_url') }}</label>
                                                <input type="text" name="youtube_video_url" class="form-control" id="youtube_video_url" value="{{ $item_section->youtube_video_url }}">
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" name="youtube_video_url">
                                    @endif
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
                                        <label for="button_url_2">{{ __('content.button_url_2') }}</label>
                                        <input type="text" name="button_url_2" class="form-control" id="button_url_2" value="{{ $item_section->button_url_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bannerDestroyModal{{ $item_section->id }}">
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
                                        <form class="d-inline-block" action="{{ route('banner.destroy_image', $item_section->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($style == 'style3')
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
                                            <form class="d-inline-block" action="{{ route('banner.destroy_image_2', $item_section->id) }}" method="POST">
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
                            <div class="modal fade" id="deleteModal3{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModal3CenterTitle" aria-hidden="true">
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
                                            <form class="d-inline-block" action="{{ route('banner.destroy_image_3', $item_section->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="bannerDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="bannerDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bannerDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('banner.destroy', $item_section->id) }}" method="POST">
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
                                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif

                                    <input name="style" type="hidden" value="{{ $style }}">

                                    <div class="row">
                                        @if ($style == 'style1' || $style == 'style2' || $style == 'style3')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }}
                                                    @if ($style == 'style1' || $style == 'style2') 354 x 354) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style3' || $style == 'style4') 1920 x 1080) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @endif
                                                </label>
                                                <input type="file" name="section_image" class="form-control-file" id="section_image">
                                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($style == 'style3')
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_image_2">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 1080) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                    <input type="file" name="section_image_2" class="form-control-file" id="section_image_2">
                                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_image_3">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 1080) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                    <input type="file" name="section_image_3" class="form-control-file" id="section_image_3">
                                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('content.title') }}</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">{{ __('content.description') }}</label>
                                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</span>
                                                </small>
                                            </div>
                                        </div>
                                        @if ($style == 'style4')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="youtube_video_url">{{ __('content.youtube_video_url') }}</label>
                                                <input type="text" name="youtube_video_url" class="form-control" id="youtube_video_url">
                                            </div>
                                        </div>
                                        @else
                                            <input type="hidden" name="youtube_video_url">
                                        @endif
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
                                                <label for="button_url_2">{{ __('content.button_url_2') }}</label>
                                                <input type="text" name="button_url_2" class="form-control" id="button_url_2">
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
