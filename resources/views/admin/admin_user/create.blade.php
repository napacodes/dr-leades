@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_admin_user') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('admin-user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group form-group-default">
                                          <label for="role_id">{{ __('content.role_name') }} <span class="text-red">*</span></label>
                                          <select  class="form-control" name="role_id" id="role_id" required>
                                              @foreach($admin_roles as $admin_role)
                                                  <option value="{{$admin_role->id}}">{{$admin_role->name}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                          <input id="name" name="name" type="text" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="email">{{ __('content.email') }} <span class="text-red">*</span></label>
                                          <input id="email" name="email" type="email" class="form-control" required>
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
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection