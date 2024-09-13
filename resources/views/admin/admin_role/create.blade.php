@extends('layouts.admin.master')

@section('content')


    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_admin_role') }}</h4>
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('admin-role.store') }}" method="POST">
                        @csrf
                @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.role_name') }} <span class="text-red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('content.permissions') }} <span class="text-red">*</span></label><br>
                                    @foreach ($permissions as $permission)
                                        <span class="badge badge-success mr-3 mb-3 font-16"><input type="checkbox" name="is_ok[]" value="{{ $permission->name }}"> {{ $permission->name }}</span>
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
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
