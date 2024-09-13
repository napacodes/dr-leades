@extends('layouts.admin.master')

@section('content')


    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.change_password') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('profile.change_password_update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currentPass">{{ __('content.current_password') }} <span class="text-red">*</span></label>
                                <input id="currentPass" name="current_password" type="password" class="form-control" required>
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
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">
                                {{ __('content.update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
