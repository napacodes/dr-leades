@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_feature') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('feature.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <input name="style" type="hidden" value="{{ $item->style }}">

                        <div class="row">
                            <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <legend class="font-14">{{ __('content.type') }}</legend>
                                        <div class="form-check pl-0 mb-2">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" {{ $item->type == 'icon' ? 'checked' : '' }}><span class="ml-3">{{ __('content.icon') }}</span>
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check pl-0">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image" {{ $item->type == 'image' ? 'checked' : '' }}><span class="ml-3">{{ __('content.image') }}</span>
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </fieldset>
                                    <div class="form-group" id="icon-type" style="{{ $item->type == 'icon' ? 'display:block' : 'display:none' }}">
                                        <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                        <div class="btn-group">
                                            <input type="hidden" name="icon" class="form-control" id="icon" value="{{ $item->icon }}">
                                            <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="{{ $item->icon }} iconpicker-component"></i></button>
                                            <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu"></div>
                                        </div>
                                    </div>
                                    <div id="image-type" style="{{ $item->type == 'image' ? 'display:block' : 'display:none' }}">
                                        <div class="form-group">
                                            <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 64 x 64) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                            <input type="file" name="section_image" class="form-control-file" id="section_image">
                                            <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($item->section_image))
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/feature/'.$item->section_image) }}" alt="image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        @if (!empty($item->section_image))
                                                            <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $item->id }}">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subtitle">{{ __('content.subtitle') }} </label>
                                    <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ $item->subtitle }}">
                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'subtitle')">{{ __('<a href="">') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'subtitle')">{{ __('<br>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'subtitle')">{{ __('<b>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'subtitle')">{{ __('<i>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'subtitle')">{{ __('<span>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'subtitle')">{{ __('<p>') }}</span>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} </label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $item->title }}">
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
                                    <label for="description">{{ __('content.description') }} </label>
                                    <textarea name="description" class="form-control" id="description" rows="3">{{ $item->description }}</textarea>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $item->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteImageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalCenterTitle" aria-hidden="true">
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
                                    <form class="d-inline-block" action="{{ route('feature.destroy_image', $item->id) }}" method="POST">
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
