@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_counter') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('counter.update', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                        <input name="style" type="hidden" value="{{ $item->style }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timer">{{ __('content.timer') }} </label>
                                    <input type="text" name="timer" class="form-control" id="timer" value="{{ $item->timer }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} </label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $item->title }}">
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
