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
                    <form action="{{ route('about.update_feature', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <input name="style" type="hidden" value="{{ $item->style }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_2">{{ __('content.title') }} </label>
                                    <input type="text" name="title" class="form-control" id="title_2" value="{{ $item->title }}">
                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title_2')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title_2')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title_2')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title_2')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title_2')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title_2')">{{ __('<p>') }}</small>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }} </label>
                                        <textarea name="description" class="form-control" id="description" rows="3">{{ $item->description }}</textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }} <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description_2')">{{ __('<a href="">') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description_2')">{{ __('<br>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description_2')">{{ __('<b>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description_2')">{{ __('<i>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description_2')">{{ __('<span>') }}</span> <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description_2')">{{ __('<p>') }}</small>
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
