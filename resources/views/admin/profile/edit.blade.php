@extends('layouts.admin.master')

@section('content')


    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.profile') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form  action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">{{ __('content.email') }} <span class="text-red">*</span></label>
                                <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 128x128)(.png, .jpg, .jpeg)</label>
                                <input id="image" name="profile_photo_path" type="file" class="form-control-file">
                                @if (!empty($user->profile_photo_path))
                                    <img src="{{ asset('uploads/img/profile/'.$user->profile_photo_path) }}" class="img-fluid image-size rounded-circle mt-3" alt="profile image">
                                @else
                                    <img src="{{ asset('uploads/img/dummy/128x128.jpg') }}" class="img-fluid image-size rounded-circle mt-3" alt="profile image">
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('content.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
