@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_career') }}
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('content.select') }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"  href="{{ route('career-content.create', $career->id) }}">{{ __('content.career_content') }}</a>
                            </div>
                        </div>
                        <!-- Button -->
                        <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                        <!-- Modal -->
                        <div id="imageModal" class="border border-success iyzi-modal">
                            <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/team-'.$career->style.'.jpg') }}" alt="draft image">
                        </div>
                    </h4>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('career.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <input name="style" type="hidden" value="{{ $career->style }}">

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $career->title }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                        <select class="form-control" name="category_id" id="category" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id}}" {{ $category->id == $career->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description">{{ __('content.short_description') }}</label>
                                        <textarea type="text" name="short_description" class="form-control" id="short_description" rows="3">{{ $career->short_description }}</textarea>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <legend class="font-14">{{ __('content.type') }}</legend>
                                    <div class="form-check pl-0 mb-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" {{ $career->type == 'icon' ? 'checked' : '' }}><span class="ml-3">{{ __('content.icon') }}</span>
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="form-check pl-0">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image" {{ $career->type == 'image' ? 'checked' : '' }}><span class="ml-3">{{ __('content.image') }}</span>
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </fieldset>
                                <div class="form-group" id="icon-type" style="{{ $career->type == 'icon' ? 'display:block' : 'display:none' }}">
                                    <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                    <div class="btn-group">
                                        <input type="hidden" name="icon" class="form-control" id="icon" value="{{ $career->icon }}">
                                        <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="{{ $career->icon }} iconpicker-component"></i></button>
                                        <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu"></div>
                                    </div>
                                </div>
                                <div id="image-type" style="{{ $career->type == 'image' ? 'display:block' : 'display:none' }}">
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
                                                        @if (!empty($career->section_image))
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/career/'.$career->section_image) }}" alt="image" class="rounded">
                                                            </a>
                                                        @else
                                                            <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @if (!empty($career->section_image))
                                                        <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $career->id }}">
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
                                        <label for="button_name">{{ __('content.button_name') }} </label>
                                        <input id="button_name" name="button_name" type="text" class="form-control" value="{{ $career->button_name }}">
                                        <small class="form-text text-muted">{{ __('content.when_you_leave_this_section_blank_it_will_go_to_its_own_detail_page') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="button_url">{{ __('content.button_url') }} </label>
                                        <input id="button_url" name="button_url" type="text" class="form-control" value="{{ $career->button_url }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="{{ $career->order }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="published" {{ $career->status == 'published' ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                            <option value="draft" {{ $career->status == 'draft' ? 'selected' : '' }}>{{ __('content.draft') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                    </div>
                                </div>
                            </div>

                </form>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteImageModal{{ $career->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalCenterTitle" aria-hidden="true">
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
                                    <form class="d-inline-block" action="{{ route('career.destroy_image', $career->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
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
