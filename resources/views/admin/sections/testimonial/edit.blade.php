@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_testimonial') }}
                        <!-- Button -->
                        <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                        <!-- Modal -->
                        <div id="imageModal" class="border border-success iyzi-modal">
                            <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/testimonial-style1.jpg') }}" alt="draft image">
                        </div>
                    </h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                <form action="{{ route('testimonial.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @endif

                    <input type="hidden" name="style" value="{{ $item->style }}">

                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 80 x 80) (.svg, .jpg, .jpeg, .png, .webp)</label>
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
                                                            <img src="{{ asset('uploads/img/testimonial/'.$item->section_image) }}" alt="testimonial image" class="rounded w-25">
                                                        </a>
                                                    @else
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                        </a>
                                                    @endif
                                                </div>
                                                @if (!empty($item->section_image))
                                                    <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
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
                                <label for="name">{{ __('content.name') }} </label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job">{{ __('content.job') }} </label>
                                <input type="text" name="job" class="form-control" id="job" value="{{ $item->job }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">{{ __('content.description') }} </label>
                                <textarea type="text" name="description" class="form-control" id="description" rows="3">{{ $item->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="star" class="col-form-label">{{ __('content.star') }}</label>
                                <select class="form-control" name="star" id="star">
                                    <option value="5" selected>{{ __('content.select_your_option') }}</option>
                                    <option value="1" {{ $item->star == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $item->star == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $item->star == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $item->star == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $item->star == 5 ? 'selected' : '' }}>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="order">{{ __('content.order') }}</label>
                                <input type="number" name="order" class="form-control" id="order" value="{{ $item->order }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                        </div>
                    </div>
                </form>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
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
                                <form class="d-inline-block" action="{{ route('testimonial.destroy_image', $item->id) }}" method="POST">
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
