@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_service') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                <select class="form-control" name="category_id" id="category" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}" {{ $category->id == $footer->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">{{ __('content.title') }} </label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $footer->title }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url">{{ __('content.url') }} </label>
                                <input type="text" name="url" class="form-control" id="url" value="{{ $footer->url }}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                <select class="form-control" name="status" id="status">
                                    <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                    <option value="published" {{ $footer->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                    <option value="draft" {{ $footer->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="order">{{ __('content.order') }}</label>
                                <input type="number" name="order" class="form-control" id="order" value="{{ $footer->order }}">
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
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
