@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_gallery') }}
                        <!-- Button -->
                        <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                        <!-- Modal -->
                        <div id="imageModal" class="border border-success iyzi-modal">
                            <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/gallery-style1.jpg') }}" alt="draft image">
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
                    <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 420 x 400) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
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
                                                            <img src="{{ asset('uploads/img/gallery/'.$item->section_image) }}" alt="image" class="rounded">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $item->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subtitle">{{ __('content.subtitle') }} </label>
                                    <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ $item->subtitle }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $item->order }}">
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
                    <div class="modal fade" id="deleteImageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
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
                                    <form class="d-inline-block" action="{{ route('gallery.destroy_image', $item->id) }}" method="POST">
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
