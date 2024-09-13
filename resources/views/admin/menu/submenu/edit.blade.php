@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_submenu') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('submenu.update', $submenu->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="menu" class="col-form-label">{{ __('content.menus') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="menu_id" id="menu" required>
                                        @foreach ($menus as $menu)
                                            <option value="{{ $menu->id}}" {{ $menu->id == $submenu->menu_id ? 'selected' : '' }}>{{ $menu->menu_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="submenu_name">{{ __('content.submenu_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="submenu_name" class="form-control" id="submenu_name" value="{{ $submenu->submenu_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="uri" class="col-form-label">{{ __('content.pages_within_the_site') }} </label>
                                    <select class="form-control" name="uri" id="uri">
                                        <option value="">{{ __('content.empty') }}</option>
                                        @foreach ($pages as $page)
                                            @if ($page->page_name != 'blog-search-index')
                                            <option value="{{ $page->page_uri}}" {{ $page->page_uri == $submenu->uri ? 'selected' : '' }}>{{ $page->page_uri }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">{{ __('content.to_use_the_url_enter_empty_in_this_field') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">{{ __('content.url') }}</label>
                                    <input type="text" name="url" class="form-control" id="url" value="{{ $submenu->url }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $submenu->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="published" {{ $submenu->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                        <option value="draft" {{ $submenu->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
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
