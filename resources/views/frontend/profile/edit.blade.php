@extends('layouts.frontend.master')

@section('content')

    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#f4f4f4 @if (isset($breadcrumb))
            url({{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }});
    @else url({{ asset('uploads/img/dummy/1920x750.jpg') }});
    @endif" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                        <h2 class="breadcrumb-title">My Account & Profile</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ User Dashboard ================================== -->
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="property_dashboard_navbar">

                        <div class="dash_user_avater">
                            @if (!empty($user->profile_photo_path))
                                <img src="{{ asset('uploads/img/profile/'.$user->profile_photo_path) }}" class="img-fluid avater" alt="profile image">
                            @else
                                <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}" class="img-fluid avater" alt="profile image">
                            @endif
                            <h4>{{ Auth::user()->name }}</h4>
                        </div>

                        <div class="dash_user_menues">
                            <ul>
                                <li><a href="dashboard.html"><i class="fa fa-tachometer-alt"></i>Dashboard<span class="notti_coun style-1">4</span></a></li>
                                <li class="active"><a href="{{ route('profile-page.edit') }}"><i class="fa fa-user-tie"></i>My Profile</a></li>
                                <li><a href="bookmark-list.html"><i class="fa fa-bookmark"></i>Saved Property<span class="notti_coun style-2">7</span></a></li>
                                <li><a href="my-property.html"><i class="fa fa-tasks"></i>My Properties</a></li>
                                <li><a href="messages.html"><i class="fa fa-envelope"></i>Messages<span class="notti_coun style-3">3</span></a></li>
                                <li><a href="choose-package.html"><i class="fa fa-gift"></i>Choose Package<span class="expiration">10 days left</span></a></li>
                                <li><a href="submit-property-dashboard.html"><i class="fa fa-pen-nib"></i>Submit New Property</a></li>
                                <li><a href="{{ route('profile-page.change_password_edit') }}"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                            </ul>
                        </div>

                        <div class="dash_user_footer">
                            <ul>
                                <li><a href="#"><i class="fa fa-power-off"></i></a></li>
                                <li><a href="#"><i class="fa fa-comment"></i></a></li>
                                <li><a href="#"><i class="fa fa-cog"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">

                        <div class="dashboard-wraper">

                            <!-- Basic Information -->
                            <div class="frm_submit_block">
                                <h4>My Profile</h4>
                                <div class="frm_submit_wrap">

                                    @if ($demo_mode == "on")
                                        <!-- Include Alert Blade -->
                                            @include('admin.demo_mode.demo-mode')
                                        @else
                                            <form class="form-row" action="{{ route('profile-page.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                @endif

                                                <div class="form-group col-md-6">
                                                    <label>Your Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Username *"  value="{{ $user->name }}" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name="email" placeholder="Enter Email *"  value="{{ $user->email }}" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 100 x 100)(.png, .jpg, .jpeg)</label>
                                                    <input id="image" name="profile_photo_path" type="file" class="form-control-file">
                                                    @if (!empty($user->profile_photo_path))
                                                        <img src="{{ asset('uploads/img/profile/'.$user->profile_photo_path) }}" class="img-fluid mt-3" alt="profile image">
                                                    @else
                                                        <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}" class="img-fluid mt-3" alt="profile image">
                                                    @endif
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 mt-4">
                                                    <button class="btn btn-theme btn-lg" type="submit">Save Changes</button>
                                                </div>

                                            </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ User Dashboard End ================================== -->


@endsection
