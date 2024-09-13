@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_menu_name') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="menu_name">{{ __('content.menu_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="menu_name" class="form-control" id="menu_name" value="{{ $menu->menu_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="uri" class="col-form-label">{{ __('content.pages_within_the_site') }} </label>
                                    <select class="form-control" name="uri" id="uri">
                                        <option value="">{{ __('content.empty') }}</option>
                                            @foreach ($pages as $page)
                                            @if ($page->page_name != 'blog-search-index')
                                            <option value="{{ $page->page_uri}}" {{ $page->page_uri == $menu->uri ? 'selected' : '' }}>{{ $page->page_uri }}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                    <small class="form-text text-muted">{{ __('content.to_use_the_url_enter_empty_in_this_field') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">{{ __('content.url') }}</label>
                                    <input type="text" name="url" class="form-control" id="url" value="{{ $menu->url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $menu->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="published" {{ $menu->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                        <option value="draft" {{ $menu->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
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
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
