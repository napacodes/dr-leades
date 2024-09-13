@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_team') }}
                        <!-- Button -->
                        <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                        <!-- Modal -->
                        <div id="imageModal" class="border border-success iyzi-modal">
                            <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/team-style1.jpg') }}" alt="draft image">
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
                    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <input name="style" type="hidden" value="{{ $team->style }}">

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $team->name }}" required>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job">{{ __('content.job') }}</label>
                                    <input id="job" name="job" type="text" class="form-control" value="{{ $team->job }}">
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                        <select class="form-control" name="category_id" id="category" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id}}" {{ $category->id == $team->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_image">{{ __('content.thumbnail') }} ({{ __('content.size') }} 200 x 200) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                        <input type="file" name="section_image" class="form-control-file" id="section_image">
                                        <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($team->section_image))
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/team/'.$team->section_image) }}" alt="image" class="rounded w-25">
                                                            </a>
                                                        @else
                                                            <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @if (!empty($team->section_image))
                                                        <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $team->id }}">
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
                                    <label for="facebook_url">{{ __('content.facebook_url') }} </label>
                                    <input id="facebook_url" name="facebook_url" type="text" class="form-control" value="{{ $team->facebook_url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="twitter_url">{{ __('content.twitter_url') }} </label>
                                    <input id="twitter_url" name="twitter_url" type="text" class="form-control" value="{{ $team->twitter_url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="instagram_url">{{ __('content.instagram_url') }} </label>
                                    <input id="instagram_url" name="instagram_url" type="text" class="form-control" value="{{ $team->instagram_url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="youtube_url">{{ __('content.youtube_url') }} </label>
                                    <input id="youtube_url" name="youtube_url" type="text" class="form-control" value="{{ $team->youtube_url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="linkedin_url">{{ __('content.linkedin_url') }} </label>
                                    <input id="linkedin_url" name="linkedin_url" type="text" class="form-control" value="{{ $team->linkedin_url }}">
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="{{ $team->order }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="published" {{ $team->status == 'published' ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                            <option value="draft" {{ $team->status == 'draft' ? 'selected' : '' }}>{{ __('content.draft') }}</option>
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
                    <div class="modal fade" id="deleteImageModal{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalCenterTitle" aria-hidden="true">
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
                                    <form class="d-inline-block" action="{{ route('team.destroy_image', $team->id) }}" method="POST">
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
