@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_language') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('language.update', $language->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_name">{{ __('content.language_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="language_name" class="form-control" id="language_name" value="{{ $language->language_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_code">{{ __('content.language_code') }} <span class="text-red">*</span></label>
                                    <input type="text" name="language_code" class="form-control" id="language_code" value="{{ $language->language_code }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                    <label for="direction" class="col-form-label">{{ __('content.direction') }}</label>
                                    <select class="form-control" name="direction" id="direction">
                                        <option value="0" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="0" {{ $language->direction == 0 ? 'selected' : '' }}>{{ __('ltr') }}</option>
                                        <option value="1" {{ $language->direction == 1 ? 'selected' : '' }}>{{ __('rtl') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                    <label for="display_dropdown" class="col-form-label">{{ __('content.display_dropdown') }}</label>
                                    <select class="form-control" name="display_dropdown" id="display_dropdown">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $language->display_dropdown == 1 ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                        <option value="0" {{ $language->display_dropdown == 0 ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                    </select>
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