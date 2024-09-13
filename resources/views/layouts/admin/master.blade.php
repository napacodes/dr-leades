<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    @isset($favicon)

        @if (!empty($favicon->favicon_image))
            <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
            <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
        @endif

    @else

        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />

    @endisset


    <!-- Fonts -->
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/color-picker-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/form-picker.css') }}">

    <!-- Tags Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/jquery.tagsinput.min.css') }}">


    <!-- Master Stylesheet CSS -->
    @if (session()->has('language_direction_from_dropdown'))

        @if(session()->get('language_direction_from_dropdown') == 1)

            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/version_rtl/style.css') }}">

        @endif

        @if(session()->get('language_direction_from_dropdown') == 0)

            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/style.css') }}">

        @endif

    @elseif (isset($language))

        @if ($language->direction == 0)
            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/style.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/version_rtl/style.css') }}">

        @endif

    @endif

    <!-- Light box CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/new/ekko-lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/new/lightbox.min.css') }}">

    <!-- Data tables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/datatables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/responsive.bootstrap4.css') }}">

    <!-- Summer note Css -->
    <link href="{{ asset('assets/admin/side_menu/css/summernote-bs4.min.css') }}" rel="stylesheet">

    <!-- Draggable Css -->
    <link href="{{ asset('assets/admin/side_menu/css/draggable.css') }}" rel="stylesheet">

</head>

<body @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-version" @endif @elseif (isset($language)) @if ($language->direction == 1) class="rtl-version" @endif  @endif >

<!-- ======================================
******* Main Page Wrapper **********
======================================= -->

<div class="main-container-wrapper">
    <!-- Top bar area -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            @isset($panel_image)

                @if (!empty($panel_image->section_image))
                    <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/img/general/'.$panel_image->section_image) }}" class="mr-2" alt="logo" />
                    </a>
                @endif

                @if (!empty($panel_image->section_image_2))
                    <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/img/general/'.$panel_image->section_image_2) }}" alt="logo" />
                    </a>
                @endif

            @else

                <a class="navbar-brand brand-logo mr-5" href="#">
                    <img src="{{ asset('uploads/img/dummy/328x96.jpg') }}" class="mr-2" alt="logo" />
                </a>

                <a class="navbar-brand brand-logo-mini" href="#">
                    <img src="{{ asset('uploads/img/dummy/112x96.jpg') }}" alt="logo" />
                </a>

            @endisset

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item d-none d-md-block">
                    <span class="badge badge-primary">
                    {{ __('content.data_language') }}: {{ $data_language->language_name }} <i class="fas fa-hand-point-right ml-1"></i>

                    </span>
                </li>
                <li  class="nav-item dropdown dropdown-animate">
                    <a href="#" class="count-indicator"  data-toggle="modal" data-target="#processedLanguageModal">
                        <i class="fas fa-globe-europe"></i>
                    </a>
                </li>
            </ul>
            <ul class="top-navbar-area navbar-nav navbar-nav-right">
                <li  class="nav-item dropdown dropdown-animate">
                    <a href="{{ url('/') }}" class="badge badge-primary d-none d-md-block">
                        {{ __('content.site') }}
                    </a>
                </li>

                @if (count($display_dropdowns) > 0)
                    <li class="nav-item dropdown dropdown-animate">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif<i class="arrow_carrot-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('content.languages') }}</p>

                            @foreach ($display_dropdowns as $display_dropdown)
                                <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}" class="dropdown-item preview-item d-flex align-items-center">{{ $display_dropdown->language_name }}</a>
                            @endforeach

                        </div>
                    </li>
                @endif

                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        @if (count($general_unread_message_count) > 0)
                            <span class="count"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('content.notifications') }}</p>

                        @can('contact message check')
                            <a href="{{ url('admin/contact-message') }}" class="dropdown-item preview-item d-flex align-items-center">
                                <div class="notification-thumbnail">
                                    <div class="preview-icon bg-primary">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="notification-item-content">
                                    <h6>{{ __('content.messages') }}</h6>
                                    <p class="mb-0">
                                        {{ count($general_unread_message_count) }}
                                    </p>
                                </div>
                            </a>
                        @endcan

                    </div>
                </li>


                <li class="nav-item nav-profile dropdown dropdown-animate">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        @if(Auth::user()->profile_photo_path != null)
                            <img src="{{ asset('uploads/img/profile/'.Auth::user()->profile_photo_path) }}" class="img-profile rounded-circle" alt="profile image">
                        @else
                            <img src="{{ asset('uploads/img/dummy/128x128.jpg') }}" class="img-profile rounded-circle" alt="profile image">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <a href="{{ url('admin/profile/edit') }}" class="dropdown-item"><i class="fas fa-user profile-icon" aria-hidden="true"></i> {{ __('content.profile') }}</a>
                        <a href="{{ url('admin/profile/change-password') }}" class="dropdown-item"><i class="fas fa-unlock-alt profile-icon" aria-hidden="true"></i> {{ __('content.change_password') }}</a>

                        <!-- Authentication -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="fas fa-link profile-icon" aria-hidden="true"></i>
                            {{ __('content.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-layout-grid2"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <!-- Side Menu area -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/dashboard') }}">
                        <i class="fas fa-th-large menu-icon"></i>
                        <span class="menu-title">{{ __('content.dashboard') }}</span>
                    </a>
                </li>
                @can('page builder check')
                    <li class="nav-item {{ (request()->is('admin/page-name/create') ||
                                            request()->is('admin/page-name/*/edit') ||
                                            request()->is('admin/page-builder/create') ||
                                            request()->is('admin/page-builder/*/edit') ) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#page_builders" aria-expanded="false" aria-controls="page_builders">
                            <i class="fa fa-home menu-icon"></i>
                            <span class="menu-title">{{ __('content.page_builder') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/page-name/create') ||
                                                 request()->is('admin/page-name/*/edit') ||
                                                 request()->is('admin/page-builder/create') ||
                                                 request()->is('admin/page-builder/*/edit')) ? 'show' : '' }}" id="page_builders">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/page-name/create') || request()->is('admin/page-name/*/edit')) ? 'active' : '' }}" href="{{ url('admin/page-name/create') }}">{{ __('content.page_names') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/page-builder/create') || request()->is('admin/page-builder/*/edit')) ? 'active' : '' }}" href="{{ url('admin/page-builder/create') }}">{{ __('content.pages') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('menu check')
                    <li class="nav-item {{ (request()->is('admin/menu/create') ||
                                            request()->is('admin/menu/*/edit') ||
                                            request()->is('admin/submenu/create') ||
                                            request()->is('admin/submenu/*/edit') ) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#menus" aria-expanded="false" aria-controls="menus">
                            <i class="fa fa-bars menu-icon"></i>
                            <span class="menu-title">{{ __('content.menus') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/menu/create') ||
                                                 request()->is('admin/menu/*/edit') ||
                                                 request()->is('admin/submenu/create') ||
                                                 request()->is('admin/submenu/*/edit')) ? 'show' : '' }}" id="menus">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/menu/create') || request()->is('admin/menu/*/edit')) ? 'active' : '' }}" href="{{ url('admin/menu/create') }}">{{ __('content.menu') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/submenu/create') || request()->is('admin/submenu/*/edit')) ? 'active' : '' }}" href="{{ url('admin/submenu/create') }}">{{ __('content.submenu') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('upload check')
                    <li class="nav-item  {{ (request()->is('admin/photo/create') ||
                              request()->is('admin/photo/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/photo/create') }}">
                            <i class="fas fa-cloud-upload-alt menu-icon"></i>
                            <span class="menu-title">{{ __('content.uploads') }}</span>
                        </a>
                    </li>
                @endcan
                @can('blog check')
                    <li class="nav-item {{ (request()->is('admin/blog') ||
                             request()->is('admin/blog/create') ||
                             request()->is('admin/blog/*/edit') ||
                             request()->is('admin/category/create') ||
                             request()->is('admin/category/*/edit') ||
                             request()->is('admin/blog-image/*/create') ||
                             request()->is('admin/blog-image/*/*/edit') ||
                             request()->is('admin/blog-detail/*/create') ||
                             request()->is('admin/blog-detail/*/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
                            <i class="fab fa-blogger-b menu-icon"></i>
                            <span class="menu-title">{{ __('content.blogs') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/blog') ||
                                   request()->is('admin/blog/create') ||
                                   request()->is('admin/blog/*/edit') ||
                                   request()->is('admin/category/create') ||
                                   request()->is('admin/category/*/edit') ||
                                   request()->is('admin/blog-image/*/create') ||
                                   request()->is('admin/blog-image/*/*/edit') ||
                                   request()->is('admin/blog-detail/*/create') ||
                                   request()->is('admin/blog-detail/*/*/edit')) ? 'show' : '' }}" id="blogs">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/category/create') || request()->is('admin/category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog/create')) ? 'active' : '' }}" href="{{ url('admin/blog/create') }}">{{ __('content.add_blog') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog') || request()->is('admin/blog/*/edit') ||
                                request()->is('admin/blog-image/*/create') || request()->is('admin/blog-image/*/*/edit') ||
                                request()->is('admin/blog-detail/*/create') || request()->is('admin/blog-detail/*/*/edit')) ? 'active' : '' }}" href="{{ url('admin/blog') }}">{{ __('content.blogs') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('section check')
                    <li class="nav-item {{ (
                        request()->is('admin/banner/create/*') ||
                        request()->is('admin/banner/create') ||
                        request()->is('admin/about/create/*') ||
                        request()->is('admin/about/create') ||
                        request()->is('admin/about-feature/*/edit') ||
                        request()->is('admin/feature/create/*') ||
                        request()->is('admin/feature/create') ||
                        request()->is('admin/feature/*/edit') ||
                            request()->is('admin/counter/create/*') ||
                            request()->is('admin/counter/create') ||
                            request()->is('admin/counter/*/edit') ||
                       request()->is('admin/work-process/create/*') ||
                            request()->is('admin/work-process/create') ||
                            request()->is('admin/work-process/*/edit') ||
                            request()->is('admin/history/create/*') ||
                            request()->is('admin/history/create') ||
                            request()->is('admin/history/*/edit') ||
                       request()->is('admin/why-choose/create/*') ||
                            request()->is('admin/why-choose/create') ||
                            request()->is('admin/why-choose/*/edit') ||
                        request()->is('admin/testimonial/create/*') ||
                        request()->is('admin/testimonial/create') ||
                        request()->is('admin/testimonial/*/edit') ||
                            request()->is('admin/contact-info/create/*') ||
                            request()->is('admin/contact-info/create') ||
                            request()->is('admin/map/create/*') ||
                            request()->is('admin/map/create') ||

                        request()->is('admin/sponsor/create/*') ||
                        request()->is('admin/sponsor/create') ||
                        request()->is('admin/sponsor/*/edit') ||
                            request()->is('admin/video/create/*') ||
                            request()->is('admin/video/create') ||
                        request()->is('admin/faq/create/*') ||
                        request()->is('admin/faq/create') ||
                        request()->is('admin/faq/*/edit') ||
                        request()->is('admin/call-to-action/create/*') ||
                        request()->is('admin/call-to-action/create') ||




                        request()->is('admin/footer') ||
                        request()->is('admin/footer/create') ||
                        request()->is('admin/footer/*/edit') ||
                        request()->is('admin/footer-category/create') ||
                        request()->is('admin/footer-category/*/edit') ||
                        request()->is('admin/plan/create') ||
                        request()->is('admin/plan/*/edit') ||

                        request()->is('admin/subscribe-section/create/*') ||
                        request()->is('admin/subscribe-section/create')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                            <i class="fas fa-puzzle-piece menu-icon"></i>
                            <span class="menu-title">{{ __('content.sections') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (
                            request()->is('admin/banner/create/*') ||
                            request()->is('admin/banner/create') ||
                            request()->is('admin/about/create/*') ||
                            request()->is('admin/about/create') ||
                            request()->is('admin/about-feature/*/edit') ||
                            request()->is('admin/feature/create/*') ||
                            request()->is('admin/feature/create') ||
                            request()->is('admin/feature/*/edit') ||
                            request()->is('admin/counter/create/*') ||
                            request()->is('admin/counter/create') ||
                            request()->is('admin/counter/*/edit') ||
                       request()->is('admin/work-process/create/*') ||
                            request()->is('admin/work-process/create') ||
                            request()->is('admin/work-process/*/edit') ||
                              request()->is('admin/history/create/*') ||
                            request()->is('admin/history/create') ||
                            request()->is('admin/history/*/edit') ||
                       request()->is('admin/why-choose/create/*') ||
                            request()->is('admin/why-choose/create') ||
                            request()->is('admin/why-choose/*/edit') ||
                            request()->is('admin/testimonial/create/*') ||
                            request()->is('admin/testimonial/create') ||
                            request()->is('admin/testimonial/*/edit') ||
                            request()->is('admin/contact-info/create/*') ||
                            request()->is('admin/contact-info/create') ||
                            request()->is('admin/map/create/*') ||
                            request()->is('admin/map/create') ||


                             request()->is('admin/sponsor/create/*') ||
                        request()->is('admin/sponsor/create') ||
                        request()->is('admin/sponsor/*/edit') ||
                            request()->is('admin/video/create/*') ||
                            request()->is('admin/video/create') ||
                            request()->is('admin/faq/create/*') ||
                            request()->is('admin/faq/create') ||
                            request()->is('admin/faq/*/edit') ||
                             request()->is('admin/call-to-action/create/*') ||
                            request()->is('admin/call-to-action/create') ||


                            request()->is('admin/footer') ||
                            request()->is('admin/footer/create') ||
                            request()->is('admin/footer/*/edit') ||
                            request()->is('admin/footer-category/create') ||
                            request()->is('admin/footer-category/*/edit') ||
                            request()->is('admin/plan/create') ||
                            request()->is('admin/plan/*/edit') ||

                            request()->is('admin/subscribe-section/create/*') ||
                            request()->is('admin/subscribe-section/create')) ? 'show' : '' }}" id="advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/banner/create/*') || request()->is('admin/banner/create')) ? 'active' : '' }}" href="{{ url('admin/banner/create') }}">{{ __('content.banner') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/about/create/*') || request()->is('admin/about/create') || request()->is('admin/about-feature/*/edit')) ? 'active' : '' }}" href="{{ url('admin/about/create') }}">{{ __('content.about') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/history/create/*') || request()->is('admin/history/create') || request()->is('admin/history/*/edit')) ? 'active' : '' }}" href="{{ url('admin/history/create') }}">{{ __('content.history') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/feature/create/*') || request()->is('admin/feature/create') || request()->is('admin/feature/*/edit')) ? 'active' : '' }}" href="{{ url('admin/feature/create') }}">{{ __('content.features') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/counter/create/*') || request()->is('admin/counter/create') || request()->is('admin/counter/*/edit')) ? 'active' : '' }}" href="{{ url('admin/counter/create') }}">{{ __('content.counters') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/work-process/create/*') || request()->is('admin/work-process/create') || request()->is('admin/work-process/*/edit')) ? 'active' : '' }}" href="{{ url('admin/work-process/create') }}">{{ __('content.work_process') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/why-choose/create/*') || request()->is('admin/why-choose/create') || request()->is('admin/why-choose/*/edit')) ? 'active' : '' }}" href="{{ url('admin/why-choose/create') }}">{{ __('content.why_choose') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/call-to-action/create/*') || request()->is('admin/call-to-action/create')) ? 'active' : '' }}" href="{{ url('admin/call-to-action/create') }}">{{ __('content.call_to_action') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/testimonial/create/*') || request()->is('admin/testimonial/create') || request()->is('admin/testimonial/*/edit')) ? 'active' : '' }}" href="{{ url('admin/testimonial/create') }}">{{ __('content.testimonials') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/sponsor/create/*') || request()->is('admin/sponsor/create') || request()->is('admin/sponsor/*/edit')) ? 'active' : '' }}" href="{{ url('admin/sponsor/create') }}">{{ __('content.sponsors') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/video/create/*') || request()->is('admin/video/create')) ? 'active' : '' }}" href="{{ url('admin/video/create') }}">{{ __('content.video') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/faq/create/*') || request()->is('admin/faq/create') || request()->is('admin/faq/*/edit')) ? 'active' : '' }}" href="{{ url('admin/faq/create') }}">{{ __('content.faqs') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/plan/create') || request()->is('admin/plan/*/edit')) ? 'active' : '' }}" href="{{ url('admin/plan/create') }}">{{ __('content.plan') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/subscribe-section/create/*') || request()->is('admin/subscribe-section/create')) ? 'active' : '' }}" href="{{ url('admin/subscribe-section/create') }}">{{ __('content.subscribe') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/contact-info/create/*') || request()->is('admin/contact-info/create')) ? 'active' : '' }}" href="{{ url('admin/contact-info/create') }}">{{ __('content.contact_info') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/map/create/*') || request()->is('admin/map/create')) ? 'active' : '' }}" href="{{ url('admin/map/create') }}">{{ __('content.map') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/footer/create') || request()->is('admin/footer/*/edit') || request()->is('admin/footer') || request()->is('admin/footer-category/create') || request()->is('admin/footer-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/footer') }}">{{ __('content.footer') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('service check')
                    <li class="nav-item {{ (request()->is('admin/service/style1') ||
                                            request()->is('admin/service-content/*/create') ||
                                            request()->is('admin/service-info/*/create') ||
                                            request()->is('admin/service/create/*') ||
                                            request()->is('admin/service/*/edit') ||
                                            request()->is('admin/service-category/create') ||
                                            request()->is('admin/service-category/*/edit') ||
                                                  request()->is('admin/service-feature/*/create') ||
                                                  request()->is('admin/service-feature/*/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
                            <i class="fas fa-plus-square menu-icon"></i>
                            <span class="menu-title">{{ __('content.services') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/service/style1') ||
                                            request()->is('admin/service-content/*/create') ||
                                            request()->is('admin/service-info/*/create') ||
                                                  request()->is('admin/service/create/*') ||
                                                  request()->is('admin/service/*/edit') ||
                                                  request()->is('admin/service-category/create') ||
                                                  request()->is('admin/service-category/*/edit') ||
                                                  request()->is('admin/service-feature/*/create') ||
                                                  request()->is('admin/service-feature/*/*/edit')) ? 'show' : '' }}" id="services">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/service-category/create') || request()->is('admin/service-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/service-category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/service/style1') ||
                                             request()->is('admin/service-content/*/create') ||
                                             request()->is('admin/service-info/*/create') ||
                                             request()->is('admin/service/create/*') ||
                                             request()->is('admin/service-feature/*/create') ||
                                             request()->is('admin/service-feature/*/*/edit')) ? 'active' : '' }}" href="{{ url('admin/service/style1') }}">{{ __('content.services') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('portfolio check')
                    <li class="nav-item {{ (request()->is('admin/portfolio/style1') ||
                                            request()->is('admin/portfolio-content/*/create') ||
                                            request()->is('admin/portfolio/create/*') ||
                                            request()->is('admin/portfolio/*/edit') ||
                                            request()->is('admin/portfolio-category/create') ||
                                            request()->is('admin/portfolio-category/*/edit') ||
                                            request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit') ||
                                                  request()->is('admin/portfolio-image/*/create') ||
                                                  request()->is('admin/portfolio-image/*/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#portfolios" aria-expanded="false" aria-controls="portfolios">
                            <i class="fas fa-briefcase menu-icon"></i>
                            <span class="menu-title">{{ __('content.portfolio') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/portfolio/style1') ||
                                            request()->is('admin/portfolio-content/*/create') ||
                                                  request()->is('admin/portfolio/create/*') ||
                                                  request()->is('admin/portfolio/*/edit') ||
                                                  request()->is('admin/portfolio-category/create') ||
                                                  request()->is('admin/portfolio-category/*/edit') ||
                                            request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit') ||
                                                  request()->is('admin/portfolio-image/*/create') ||
                                                  request()->is('admin/portfolio-image/*/*/edit')) ? 'show' : '' }}" id="portfolios">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/portfolio-category/create') || request()->is('admin/portfolio-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/portfolio-category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/portfolio/style1') ||
                                             request()->is('admin/portfolio-content/*/create') ||
                                             request()->is('admin/portfolio/create/*') ||
                                            request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit') ||
                                             request()->is('admin/portfolio-image/*/create') ||
                                             request()->is('admin/portfolio-image/*/*/edit')) ? 'active' : '' }}" href="{{ url('admin/portfolio/style1') }}">{{ __('content.portfolio') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('team check')
                    <li class="nav-item {{ (request()->is('admin/team/style1') ||

                                            request()->is('admin/team/create/*') ||
                                            request()->is('admin/team/*/edit') ||
                                            request()->is('admin/team-category/create') ||
                                            request()->is('admin/team-category/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#teams" aria-expanded="false" aria-controls="teams">
                            <i class="fas fa-people-carry menu-icon"></i>
                            <span class="menu-title">{{ __('content.teams') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/team/style1') ||

                                                  request()->is('admin/team/create/*') ||
                                                  request()->is('admin/team/*/edit') ||
                                                  request()->is('admin/team-category/create') ||
                                                  request()->is('admin/team-category/*/edit')) ? 'show' : '' }}" id="teams">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/team-category/create') || request()->is('admin/team-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/team-category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/team/style1') ||

                                             request()->is('admin/team/create/*')) ? 'active' : '' }}" href="{{ url('admin/team/style1') }}">{{ __('content.teams') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('gallery check')
                    <li class="nav-item {{ (request()->is('admin/gallery') ||
                                            request()->is('admin/gallery/create') ||
                                            request()->is('admin/gallery/*/edit') ) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
                            <i class="fas fa-images menu-icon"></i>
                            <span class="menu-title">{{ __('content.gallery') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/gallery') ||
                                                  request()->is('admin/gallery/create') ||
                                                  request()->is('admin/gallery/*/edit')) ? 'show' : '' }}" id="gallery">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/gallery/create')) ? 'active' : '' }}" href="{{ url('admin/gallery/create') }}">{{ __('content.add_gallery') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/gallery')) ? 'active' : '' }}" href="{{ url('admin/gallery') }}">{{ __('content.gallery') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('career check')
                    <li class="nav-item {{ (request()->is('admin/career/style1') ||
                                            request()->is('admin/career-content/*/create') ||
                                            request()->is('admin/career/create/*') ||
                                            request()->is('admin/career/*/edit') ||
                                            request()->is('admin/career-category/create') ||
                                            request()->is('admin/career-category/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#careers" aria-expanded="false" aria-controls="careers">
                            <i class="fas fa-folder-open menu-icon"></i>
                            <span class="menu-title">{{ __('content.careers') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/career/style1') ||
                                            request()->is('admin/career-content/*/create') ||
                                                  request()->is('admin/career/create/*') ||
                                                  request()->is('admin/career/*/edit') ||
                                                  request()->is('admin/career-category/create') ||
                                                  request()->is('admin/career-category/*/edit')) ? 'show' : '' }}" id="careers">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/career-category/create') || request()->is('admin/career-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/career-category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/career/style1') ||
                                             request()->is('admin/career-content/*/create') ||
                                             request()->is('admin/career/create/*')) ? 'active' : '' }}" href="{{ url('admin/career/style1') }}">{{ __('content.careers') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('page check')
                    <li class="nav-item {{ (request()->is('admin/page') ||
                             request()->is('admin/page/create') ||
                             request()->is('admin/page/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="fas fa-file-alt menu-icon"></i>
                            <span class="menu-title">{{ __('content.pages') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/page') ||
                                   request()->is('admin/page/create') ||
                                   request()->is('admin/page/*/edit')) ? 'show' : '' }}" id="pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/page/create')) ? 'active' : '' }}" href="{{ url('admin/page/create') }}">{{ __('content.add_page') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/page') || request()->is('admin/page/*/edit')) ? 'active' : '' }}" href="{{ url('admin/page') }}">{{ __('content.pages') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('contact message check')
                    <li class="nav-item {{ (
                                            request()->is('admin/contact-message')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#contact-message" aria-expanded="false" aria-controls="contact-message">
                            <i class="fas fa-map-marked menu-icon"></i>
                            <span class="menu-title">{{ __('content.contact') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (
                                                 request()->is('admin/contact-message')) ? 'show' : '' }}" id="contact-message">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/contact-message')) ? 'active' : '' }}" href="{{ url('admin/contact-message') }}">{{ __('content.messages') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('subscribe check')
                    <li class="nav-item {{ (request()->is('admin/subscribe/create')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#subscribers" aria-expanded="false" aria-controls="subscribers">
                            <i class="fas fa-at menu-icon"></i>
                            <span class="menu-title">{{ __('content.subscribers') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/subscribe/create')) ? 'show' : '' }}" id="subscribers">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/subscribe/create')) ? 'active' : '' }}" href="{{ url('admin/subscribe/create') }}">{{ __('content.subscribers') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('setting check')
                    <li class="nav-item {{ (
                                                 request()->is('admin/preloader/create') ||
                                                 request()->is('admin/favicon/create') ||
                                                 request()->is('admin/seo/create') ||
                                                 request()->is('admin/header-image/create/*') ||
                                                 request()->is('admin/header-image/create') ||
                                                 request()->is('admin/external-url/create') ||
                                                 request()->is('admin/footer-image/create/*') ||
                                                 request()->is('admin/footer-image/create') ||
                                                 request()->is('admin/panel-image/create') ||
                                                 request()->is('admin/site-info/create') ||
                                                 request()->is('admin/header-info/create') ||
                                                 request()->is('admin/header-info/create/*') ||
                                                 request()->is('admin/contact-info-widget/create') ||
                                                 request()->is('admin/contact-info-widget/create/*') ||
                                                 request()->is('admin/breadcrumb-image/create') ||
                                                 request()->is('admin/site-image/create') ||
                                                 request()->is('admin/social/create') ||
                                                 request()->is('admin/social/*/edit') ||
                                                 request()->is('admin/breadcrumb/create') ||
                                                 request()->is('admin/color-option/create') ||
                                                 request()->is('admin/google-analytic/create') ||
                                                 request()->is('admin/font/create') ||
                                                 request()->is('admin/draft-view/create') ||
                                                 request()->is('admin/tawk-to/create')  ||
                                                 request()->is('admin/quick-access/create')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                            <i class="fas fa-fw fa-cog menu-icon"></i>
                            <span class="menu-title">{{ __('content.settings') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (
                                                 request()->is('admin/preloader/create') ||
                                                 request()->is('admin/favicon/create') ||
                                                 request()->is('admin/seo/create') ||
                                                 request()->is('admin/header-image/create/*') ||
                                                 request()->is('admin/header-image/create') ||
                                                 request()->is('admin/external-url/create') ||
                                                 request()->is('admin/footer-image/create/*') ||
                                                 request()->is('admin/footer-image/create') ||
                                                  request()->is('admin/panel-image/create') ||
                                                 request()->is('admin/site-info/create') ||
                                                 request()->is('admin/header-info/create') ||
                                                 request()->is('admin/header-info/create/*') ||
                                                    request()->is('admin/contact-info-widget/create') ||
                                                 request()->is('admin/contact-info-widget/create/*') ||
                                                 request()->is('admin/breadcrumb-image/create') ||
                                                 request()->is('admin/site-image/create') ||
                                                 request()->is('admin/social/create') ||
                                                 request()->is('admin/social/*/edit') ||
                                                 request()->is('admin/breadcrumb/create') ||
                                                 request()->is('admin/color-option/create') ||
                                                 request()->is('admin/google-analytic/create') ||
                                                 request()->is('admin/font/create') ||
                                                 request()->is('admin/draft-view/create') ||
                                                 request()->is('admin/tawk-to/create')  ||
                                                 request()->is('admin/quick-access/create')) ? 'show' : '' }}" id="settings">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/preloader/create')) ? 'active' : '' }}" href="{{ url('admin/preloader/create') }}">{{ __('content.preloader') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/favicon/create')) ? 'active' : '' }}" href="{{ url('admin/favicon/create') }}">{{ __('content.favicon') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/header-info/create') || request()->is('admin/header-info/create/*')) ? 'active' : '' }}" href="{{ url('admin/header-info/create') }}">{{ __('content.header_info') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/header-image/create/*') || request()->is('admin/header-image/create')) ? 'active' : '' }}" href="{{ url('admin/header-image/create') }}">{{ __('content.header_image') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/footer-image/create/*') || request()->is('admin/footer-image/create')) ? 'active' : '' }}" href="{{ url('admin/footer-image/create') }}">{{ __('content.footer_image') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/panel-image/create') || request()->is('admin/panel-image/create')) ? 'active' : '' }}" href="{{ url('admin/panel-image/create') }}">{{ __('content.panel_image') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/external-url/create')) ? 'active' : '' }}" href="{{ url('admin/external-url/create') }}">{{ __('content.external_url') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/contact-info-widget/create') || request()->is('admin/contact-info-widget/create/*')) ? 'active' : '' }}" href="{{ url('admin/contact-info-widget/create') }}">{{ __('content.contact_info_widget') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/breadcrumb-image/create')) ? 'active' : '' }}" href="{{ url('admin/breadcrumb-image/create') }}">{{ __('content.breadcrumb_image') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-info/create')) ? 'active' : '' }}" href="{{ url('admin/site-info/create') }}">{{ __('content.site_info') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/social/create') || request()->is('admin/social/*/edit')) ? 'active' : '' }}" href="{{ url('admin/social/create') }}">{{ __('content.socials') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/google-analytic/create')) ? 'active' : '' }}" href="{{ url('admin/google-analytic/create') }}">{{ __('content.google_analytic') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/font/create')) ? 'active' : '' }}" href="{{ url('admin/font/create') }}">{{ __('content.font') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/draft-view/create')) ? 'active' : '' }}" href="{{ url('admin/draft-view/create') }}">{{ __('content.draft_view') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/tawk-to/create')) ? 'active' : '' }}" href="{{ url('admin/tawk-to/create') }}">{{ __('content.tawk_to') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/quick-access/create')) ? 'active' : '' }}" href="{{ url('admin/quick-access/create') }}">{{ __('content.quick_access_buttons') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/color-option/create')) ? 'active' : '' }}" href="{{ url('admin/color-option/create') }}">{{ __('content.color_option') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/seo/create')) ? 'active' : '' }}" href="{{ url('admin/seo/create') }}">{{ __('content.seo') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @hasrole ('super-admin')
                <li class="nav-item {{ (request()->is('admin/admin-role') ||
                         request()->is('admin/admin-role/create') ||
                         request()->is('admin/admin-role/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#admin_roles" aria-expanded="false" aria-controls="admin_roles">
                        <i class="fas fa-user-lock menu-icon"></i>
                        <span class="menu-title">{{ __('content.admin_role_manage') }}</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <div class="collapse {{ (request()->is('admin/admin-role') ||
                         request()->is('admin/admin-role/create') ||
                         request()->is('admin/admin-role/*/edit')) ? 'show' : '' }}" id="admin_roles">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-role/create')) ? 'active' : '' }}" href="{{ url('admin/admin-role/create') }}">{{ __('content.add_admin_role') }}</a></li>
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-role')) ? 'active' : '' }}" href="{{ url('admin/admin-role') }}">{{ __('content.admin_roles') }}</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ (request()->is('admin/admin-user') ||
                         request()->is('admin/admin-user/create') ||
                         request()->is('admin/admin-user/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#admins" aria-expanded="false" aria-controls="admins">
                        <i class="fas fa-users menu-icon"></i>
                        <span class="menu-title">{{ __('content.admin_manage') }}</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <div class="collapse {{ (request()->is('admin/admin-user') ||
                         request()->is('admin/admin-user/create') ||
                         request()->is('admin/admin-user/*/edit')) ? 'show' : '' }}" id="admins">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-user/create')) ? 'active' : '' }}" href="{{ url('admin/admin-user/create') }}">{{ __('content.add_admin_user') }}</a></li>
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-user')) ? 'active' : '' }}" href="{{ url('admin/admin-user') }}">{{ __('content.all_admin') }}</a></li>
                        </ul>
                    </div>
                </li>
                @endhasrole
                @can('language check')
                    <li class="nav-item  {{ (request()->is('admin/language/create') ||
                             request()->is('admin/language/*/edit') ||
                             request()->is('admin/language-keyword-for-adminpanel/create/*') ||
                             request()->is('admin/language/*/edit') ||
                             request()->is('admin/language/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/language/create') }}">
                            <i class="fas fa-language menu-icon"></i>
                            <span class="menu-title">{{ __('content.languages') }}</span>
                        </a>
                    </li>
                @endcan
                @can('clear cache check')
                    <li class="nav-item {{ (request()->is('admin/clear-cache')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/clear-cache') }}">
                            <i class="fab fa-cloudscale menu-icon"></i>
                            <span class="menu-title">{{ __('content.optimizer') }}</span>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    @if (session()->has('site_url'))
        <div class="back-to-site">
            <a href="{{ route('go-to-site-url.index', ['site_url' => session()->get('site_url')]) }}" class="btn btn-primary">{{ __('content.see_edit') }} <i class="fas fa-angle-right"></i></a>
        </div>
    @endif


    <div class="modal fade" id="processedLanguageModal" tabindex="-1" role="dialog" aria-labelledby="processedLanguageModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="processedLanguageModalLabel">{{ __('content.which_language') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('language.update_processed_language') }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_id">{{ __('content.languages') }}</label>
                                    <select class="form-control" name="language_id" id="language_id" required>
                                        @foreach ($languages as $lang)
                                            <option value="{{ $lang->id }}" {{ $lang->status == 1 ? 'selected' : '' }}>{{ $lang->language_name }}</option>
                                        @endforeach
                                        @php unset($lang); @endphp
                                    </select>
                                    <small id="language_id" class="form-text text-muted">{{ __('content.reminding') }}</small>
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>



<!-- Plugins Js -->
<script src="{{ asset('assets/admin/side_menu/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bundle.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/fullscreen.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('assets/admin/side_menu/js/canvas.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/collapse.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/settings.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/template.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/active.js') }}" defer></script>

@isset ($galleries)
    <!-- Light box JS -->
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/ekko-lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/light-box-active.js') }}" defer></script>
@endif
<!-- Datatable JS -->

<script src="{{ asset('assets/admin/side_menu/js/default-assets/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatable-responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatable-button.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/button.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/button.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/button.flash.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/button.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatables.keytable.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatables.select.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/demo.datatable-init.js') }}"></script>


<!-- Tags Input JS -->
<script src="{{ asset('assets/admin/side_menu/js/default-assets/jquey.tagsinput.min.js') }}"></script>


<!-- Datepicker JS -->
<script src="{{ asset('assets/admin/side_menu/js/default-assets/moment.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/colorpicker-bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/form-picker.js') }}"></script>

<!-- Summer note scripts -->
<script src="{{ asset('assets/admin/side_menu/js/summernote-bs4.min.js') }}"></script>

<!-- Icon Picker JS -->
<script src="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/js/fontawesome-iconpicker.min.js') }}"> </script>

<!-- Custom JS -->
<script src="{{ asset('assets/admin/side_menu/js/custom.js') }}"></script>


<script>

    // Tags Input Separate
    (function ($) {
        "use strict";
        $('#summernote').summernote({
            placeholder: '{{ __('content.description') }}',
            tabsize: 2,
            height: 400
        });

        $('#summernote2').summernote({
            placeholder: '{{ __('content.description') }}',
            tabsize: 2,
            height: 100
        });

        // Summernote code view saving
        $('.note-codable').on('blur', function() {
            var codeviewHtml        = $(this).val();
            var $summernoteTextarea = $(this).closest('.note-editor').siblings('textarea');

            $summernoteTextarea.val(codeviewHtml);
        });

        $('#general-item-list').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': '{{ __('content.add_more') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 200,
            'placeholderColor': '#555'
        });

        $('#about-item-list').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': '{{ __('content.add_more') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 200,
            'placeholderColor': '#555'
        });

        $('#service-item-list').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': '{{ __('content.add_more') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 200,
            'placeholderColor': '#555'
        });

        $('#feature-list').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': '{{ __('content.add_more') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 200,
            'placeholderColor': '#555'
        });

        $('#non-feature-list').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': '{{ __('content.add_more') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 200,
            'placeholderColor': '#555'
        });

        $('#tag-list').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': '{{ __('content.add_more') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 200,
            'placeholderColor': '#555'
        });

        @isset ($page_builder)
        // start draggable
        const dropzoneSource = document.querySelector(".source");
        const dropzone = document.querySelector(".target");
        const dropzones = [...document.querySelectorAll(".easier-dropzone")];
        const draggables = [...document.querySelectorAll(".easier-draggable")];

        function getDragAfterElement(container, y) {
            const draggableElements = [
                ...container.querySelectorAll(".easier-draggable:not(.easier-is-dragging)"),
            ];

            return draggableElements.reduce(
                (closest, child) => {
                    const box = child.getBoundingClientRect();
                    const offset = y - box.top - box.height / 2;

                    if (offset < 0 && offset > closest.offset) {
                        return {
                            offset,
                            element: child,
                        };
                    } else {
                        return closest;
                    }
                },
                { offset: Number.NEGATIVE_INFINITY }
            ).element;
        }

        draggables.forEach((draggable) => {
            draggable.addEventListener("dragstart", (e) => {
                draggable.classList.add("easier-is-dragging");
            });

            draggable.addEventListener("dragend", (e) => {
                draggable.classList.remove("easier-is-dragging");
            });

            // Add touch event listeners for mobile devices
            draggable.addEventListener("touchstart", (e) => {
                draggable.classList.add("easier-is-dragging");
            });

            draggable.addEventListener("touchend", (e) => {
                draggable.classList.remove("easier-is-dragging");
            });
        });

        dropzones.forEach((zone) => {
            zone.addEventListener("dragover", (e) => {
                e.preventDefault();
                const afterElement = getDragAfterElement(zone, e.clientY);
                const draggable = document.querySelector(".easier-is-dragging");
                if (afterElement === null) {
                    zone.appendChild(draggable);
                } else {
                    zone.insertBefore(draggable, afterElement);
                }
                updateItemData(dropzone, "updated_item");
                updateItemData(dropzoneSource, "left_item");
            });

            // Add touch event listeners for mobile devices
            zone.addEventListener("touchmove", (e) => {
                e.preventDefault();
                const touch = e.touches[0];
                const afterElement = getDragAfterElement(zone, touch.clientY);
                const draggable = document.querySelector(".easier-is-dragging");
                if (afterElement === null) {
                    zone.appendChild(draggable);
                } else {
                    zone.insertBefore(draggable, afterElement);
                }
                updateItemData(dropzone, "updated_item");
                updateItemData(dropzoneSource, "left_item");
            });
        });

        dropzone.addEventListener("drop", (e) => {
            e.preventDefault();
            updateItemData(dropzone, "updated_item");
        });

        dropzoneSource.addEventListener("drop", (e) => {
            e.preventDefault();
            updateItemData(dropzoneSource, "left_item");
        });

        function updateItemData(zone, inputId) {
            const items = [...zone.querySelectorAll(".easier-draggable")];
            const itemData = items.map((item, index) => {
                return {
                    id: item.id,
                    folder: item.getAttribute("data-value"),
                    order: index + 1,
                };
            });

            const itemDataJson = JSON.stringify(itemData);
            const itemDataInput = document.getElementById(inputId);
            itemDataInput.value = itemDataJson;
        }
// end draggable

// Add click events to buttons
        document.querySelectorAll('.move-button').forEach(button => {
            button.addEventListener('click', (e) => {
                const direction = button.dataset.direction;
                const currentItem = button.parentNode;
                const newDirection = direction === 'left' ? 'right' : 'left'; // Reverse direction
                button.setAttribute('data-direction', newDirection); // Set the new direction of the button
                const destinationZone = direction === 'left' ? dropzoneSource : dropzone;
                const targetZone = direction === 'left' ? dropzone : dropzoneSource;
                targetZone.appendChild(currentItem);

                // Create new item list
                const items = [...destinationZone.querySelectorAll(".easier-draggable")];
                const itemData = items.map((item, index) => {
                    return {
                        id: item.id,
                        folder: item.getAttribute("data-value"),
                        order: index + 1,
                    };
                });

                // Convert the new item list to JSON format
                const itemDataJson = JSON.stringify(itemData);

                // Insert the new item list into the relevant input
                if (direction === 'left') {
                    document.getElementById("left_item").value = itemDataJson;
                } else {
                    document.getElementById("updated_item").value = itemDataJson;
                }

                // Another operation such as saving to the database can be done here

                // Update relevant sections
                updateItemData(destinationZone, direction === 'left' ? "left_item" : "updated_item");
                updateItemData(targetZone, direction === 'left' ? "updated_item" : "left_item");
            });
        });

// start on text hover
        function toggleImage() {
            const links = document.querySelectorAll('.link');
            const images = document.querySelectorAll('img');

            links.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    const target = link.dataset.target;
                    const image = document.getElementById(target);
                    image.style.display = 'block';
                });

                link.addEventListener('mouseleave', () => {
                    const target = link.dataset.target;
                    const image = document.getElementById(target);
                    image.style.display = 'none';
                });
            });
        }
        toggleImage();
// end on text hover

        @endisset

        @isset ($page_builders)
        // start get segment count
        // Selecting the select element
        const pageNameSelect = document.getElementById("page_name");

        // Selecting the div element
        const selectedSegmentCountDiv = document.getElementById("selectedSegmentCountDiv");

        // Adding an event listener to the select element when it changes
        pageNameSelect.addEventListener("change", function() {
            // Getting the selected option
            const selectedOption = pageNameSelect.options[pageNameSelect.selectedIndex];

            // Getting the data-segment-count attribute
            const segmentCount = selectedOption.getAttribute("data-segment-count");

            // Updating the div content using the attribute
            selectedSegmentCountDiv.textContent = "{{ __('content.segment_count') }} " + segmentCount;
        });
        // end get segment count
        @endisset

    }(jQuery));
</script>


</body>

</html>
