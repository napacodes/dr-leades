@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_plan') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('plan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.name') }}</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tag">{{ __('content.tag') }}</label>
                                    <input type="text" name="tag" class="form-control" id="tag" value="{{ $item->tag }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="currency">{{ __('content.currency') }}</label>
                                    <input type="text" name="currency" class="form-control" id="currency" value="{{ $item->currency }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">{{ __('content.price') }}</label>
                                    <input type="text" name="price" class="form-control" id="price" value="{{ $item->price }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="extra_text">{{ __('content.extra_text') }}</label>
                                    <textarea name="extra_text" class="form-control" id="extra_text" rows="3">{{ $item->extra_text }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="feature-list">{{ __('content.feature_list') }}</label>
                                    <input type="text" name="feature_list" class="form-control" id="feature-list" value="{{ $item->feature_list }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="non-feature-list">{{ __('content.non_feature_list') }}</label>
                                    <input type="text" name="non_feature_list" class="form-control" id="non-feature-list" value="{{ $item->non_feature_list }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_name">{{ __('content.button_name') }}</label>
                                    <input type="text" name="button_name" class="form-control" id="button_name" value="{{ $item->button_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_url">{{ __('content.button_url') }}</label>
                                    <input type="text" name="button_url" class="form-control" id="button_url" value="{{ $item->button_url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="recommended" class="col-form-label">{{ __('content.recommended') }}</label>
                                    <select class="form-control" name="recommended" id="recommended">
                                        <option value="no" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="no" {{ $item->recommended == "no" ? 'selected' : '' }}>{{ __('content.no') }}</option>
                                        <option value="yes" {{ $item->recommended == "yes" ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                    </select>
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
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
