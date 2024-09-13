<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (!empty($career->title)) {{ $career->title }} @elseif (!empty($page_builder->meta_title)) {{ $page_builder->meta_title }} @elseif (isset($seo)){{ $seo->meta_title }} @endif">
    <meta name="description" content="@if (!empty($career_content->meta_description)) {{ $career_content->meta_description }} @elseif (!empty($page_builder->meta_description)) {{ $page_builder->meta_description }} @elseif (isset($seo)){{ $seo->meta_description }} @endif">
    <meta name="keywords" content="@if (!empty($career_content->meta_keyword)) {{ $career_content->meta_keyword }} @elseif (!empty($page_builder->meta_keyword)) {{ $page_builder->meta_keyword }} @elseif (isset($seo)){{ $seo->meta_keyword }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($seo)){{ $seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (!empty($career->title)) {{ $career->title }} @elseif (!empty($page_builder->meta_title)) {{ $page_builder->meta_title }} @elseif (isset($seo)){{ $seo->meta_title }} @endif">
    <meta property="og:url" content="@if (isset($seo) || isset($page_builder)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (!empty($career_content->meta_description)) {{ $career_content->meta_description }} @elseif (!empty($page_builder->meta_description)) {{ $page_builder->meta_description }} @elseif (isset($seo)){{ $seo->meta_description }} @endif">
    <meta property="og:image" content="@if (!empty($favicon->favicon_image)){{ asset('uploads/img/general/'.$favicon->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($favicon->favicon_image)){{ asset('uploads/img/general/'.$favicon->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($favicon->favicon_image)){{ asset('uploads/img/general/'.$favicon->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (!empty($career->title)) {{ $career->title }} @elseif (!empty($page_builder->meta_title)) {{ $page_builder->meta_title }} @elseif (isset($seo)){{ $seo->meta_title }} @endif">
    <meta property="twitter:description" content="@if (!empty($career_content->meta_description)) {{ $career_content->meta_description }} @elseif (!empty($page_builder->meta_description)) {{ $page_builder->meta_description }} @elseif (isset($seo)){{ $seo->meta_description }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@if (!empty($career->title)) {{ $career->title }} @elseif (!empty($page_builder->meta_title)) {{ $page_builder->meta_title }} @elseif  (isset($seo)) {{ $seo->meta_title }} @endif</title>

    @if (!empty($favicon->favicon_image))
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @isset ($font)
        <!-- Google Fonts -->
        <link href="{{ $font->text_font_link }}" rel="stylesheet">
        <link href="{{ $font->title_font_link }}" rel="stylesheet">
    @else
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
    @endisset


    <!--// Boostrap v5 //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/magnific.popup.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/animate.min.css') }}">
    <!--// Vegas Slider Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/vegas.slider.min.css') }}">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.min.css') }}">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.default.min.css') }}">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font_awesome/css/all.css') }}">
    <!--// Flat Icons //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flat_icons/flaticon.css') }}">

    <style>

        :root {
            @isset ($color_option)

            @if ($color_option->color_option != 0)
            --main-color: {{ $color_option->main_color }};
            --secondary-color: {{ $color_option->secondary_color }};
            --scroll-button-color: {{ $color_option->scroll_button_color }};
            --bottom-button-color: {{ $color_option->bottom_button_color }};
            --bottom-button-hover-color: {{ $color_option->bottom_button_hover_color }};
            --side-button-color: {{ $color_option->side_button_color }};
            @else
            --main-color: #ff4500;
            --secondary-color: #171718;
            --scroll-button-color: #00baa3;
            --bottom-button-color: #212529;
            --bottom-button-hover-color: #333;
            --side-button-color: #25d366;
            @endif

            @else
            --main-color: #ff4500;
            --secondary-color: #171718;
            --scroll-button-color: #00baa3;
            --bottom-button-color: #212529;
            --bottom-button-hover-color: #333;
            --side-button-color: #25d366;
            @endisset

            @isset ($font)

            --title-font:@php echo html_entity_decode($font->title_font_family); @endphp;
            --text-font: @php echo html_entity_decode($font->text_font_family); @endphp;

            @else
            --title-font: 'Poppins', sans-serif;
            --text-font: 'Roboto', sans-serif;
        @endisset


        }

    </style>

    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!--// Theme Color Css //-->

    <!--  helper style css file -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/helper-style.css') }}">

    <style>
        #counters {
            background-image: url({{ asset('uploads/img/dummy/bg/counter-bg.png') }});
        }
    </style>

    @if (isset($google_analytic))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif
    @livewireStyles

</head>
<body data-bs-spy="scroll" data-bs-target="#fixedNavbar" @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-mode" @endif @elseif (isset($language)) @if ($language->direction == 1) class="rtl-mode" @endif  @endif >

<!--// Page Wrapper Start //-->
<div class="page-wrapper" id="wrapper">

    @include('frontend.sections.header.header-style1')

    <!--// Main Area Start //-->
    <main class="main-area">

        @include('frontend.sections.breadcrumb.breadcrumb-style1')
        @include('frontend.career.career-detail')
        @include('frontend.sections.footer.footer-style1')

    </main>
    <!--// Main Area End //-->

    <a href="#" class="scroll-top-btn" data-scroll-goto="1">
        <i class="fa fa-arrow-up"></i>
    </a>
    <!--// .scroll-top-btn // -->

    @include('frontend.sections.preloader.preloader')

</div>
<!--// Page Wrapper End //-->

@include('frontend.sections.widget.bottom-style1')
@include('frontend.sections.widget.side-style1')



<!--// JQuery //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.min.js') }}"></script>
<!--// Bootstrap //-->
<script src="{{ asset('assets/frontend/vendor/js/bootstrap.min.js') }}"></script>
<!--// Images Loaded Js //-->
<script src="{{ asset('assets/frontend/vendor/js/images.loaded.min.js') }}"></script>
<!--// Wow Js //-->
<script src="{{ asset('assets/frontend/vendor/js/wow.min.js') }}"></script>
<!--// Magnific Popup //-->
<script src="{{ asset('assets/frontend/vendor/js/magnific.popup.min.js') }}"></script>
<!--// Waypoint Js //-->
<script src="{{ asset('assets/frontend/vendor/js/waypoint.min.js') }}"></script>
<!--// Counter Up Js //-->
<script src="{{ asset('assets/frontend/vendor/js/counter.up.min.js') }}"></script>
<!--// JQuery Easing Functions //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.easing.min.js') }}"></script>
<!--// Owl Carousel //-->
<script src="{{ asset('assets/frontend/vendor/js/owl.carousel.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('assets/frontend/vendor/js/validate.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('assets/frontend/vendor/js/custom.select.plugin.js') }}"></script>
<!--// Scroll It //-->
<script src="{{ asset('assets/frontend/vendor/js/scrollit.min.js') }}"></script>
<!--// Isotope Js //-->
<script src="{{ asset('assets/frontend/vendor/js/isotope.min.js') }}"></script>
<!--// Main Js //-->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>



@isset ($tawk_to)
    <script>
        @php echo html_entity_decode($tawk_to->tawk_to); @endphp
    </script>
@endisset

@livewireScripts

</body>
</html>

