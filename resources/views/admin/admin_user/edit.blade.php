@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_admin_user') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('admin-user.update', $admin_user->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="role_id">{{ __('content.role_name') }} <span class="text-red">*</span></label>
                                    <select  class="form-control" name="role_id" id="role_id" required>
                                        @foreach($admin_roles as $admin_role)
                                            <option value="{{$admin_role->id}}" {{ $admin_role->name == $admin_user->getRoleNames()->first() ? 'selected' : '' }}>{{ $admin_role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ $admin_user->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">{{ __('content.email') }} <span class="text-red">*</span></label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ $admin_user->email }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">{{ __('content.new_password') }} <span class="text-red">*</span></label>
                                    <input id="password" name="password" type="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="confirmPass">{{ __('content.confirm_password') }} <span class="text-red">*</span></label>
                                    <input id="confirmPass" name="password_confirmation" type="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 128x128)(.png, .jpg, .jpeg)</label>
                                    <input id="image" name="profile_photo_path" type="file" class="form-control-file">
                                    @if (!empty($admin_user->profile_photo_path))
                                        <img src="{{ asset('uploads/img/profile/admin/'.$admin_user->profile_photo_path) }}" class="img-fluid image-size rounded-circle mt-3" alt="profile image">
                                    @else
                                        <img src="{{ asset('uploads/img/dummy/128x128.jpg') }}" class="img-fluid image-size rounded-circle mt-3" alt="profile image">
                                    @endif
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