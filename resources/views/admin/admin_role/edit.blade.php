@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_admin_role') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('admin-role.update', $role->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.role_name') }} <span class="text-red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ $role->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('content.permissions') }} <span class="text-red">*</span></label><br>
                                    @php
                                        $role_permissions =  $role->getAllPermissions();
                                        $checked_permissions = array();
                                    foreach ($role_permissions as $role_permission) {
                                    $checked_permissions[] = $role_permission->name;
                                    }
                                    @endphp
                                    @foreach ($permissions as $permission)
                                            @if (in_array($permission->name , $checked_permissions))
                                                <span class="badge badge-success mr-3 mb-3 font-16"><input type="checkbox" name="is_ok[]" value="{{ $permission->name }}" checked> {{ $permission->name }}</span>
                                            @else
                                                <span class="badge badge-success mr-3 mb-3 font-16"><input type="checkbox" name="is_ok[]" value="{{ $permission->name }}"> {{ $permission->name }}</span>
                                            @endif
                                    @endforeach
                                    <small class="form-text text-muted">{{ __('content.set_permissions_for_this_role') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection