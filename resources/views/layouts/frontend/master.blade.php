<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta name="description" content="@if (isset($service)) {{ $service->meta_description }} @elseif (isset($blog)) {{ $blog->meta_description }} @elseif (isset($seo)) {{ $seo->site_description }} @endif">
    <meta name="keywords" content="@if (isset($service)) {{ $service->meta_keyword }} @elseif (isset($blog)) {{ $software->meta_keyword }} @elseif (isset($seo)) {{ $seo->site_keyword }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($seo)){{ $seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($seo)){{ $seo->site_description }} @endif">
    <meta property="og:image" content="@if (!empty($site_image->favicon_image)){{ asset('uploads/img/general/'.$site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($site_image->favicon_image)){{ asset('uploads/img/general/'.$site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($site_image->favicon_image)){{ asset('uploads/img/general/'.$site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($seo)){{ $seo->site_description }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($seo)) - {{ $seo->site_name }} @endif</title>

    @if (!empty($favicon->favicon_image))
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!-- ===========  All Stylesheet ================= -->
    <!--  Icon css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icons.css') }}">
    <!--  animate css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!--  slick css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">
    <!--  magnific-popup css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <!-- metis menu css file -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/metismenu.css') }}">
    <!--  Bootstrap css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!--  main style css file -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!--  helper style css file -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/helper-style.css') }}">

    <style>
        .faq-video-wrapper::after {
            background-image: url({{ asset('uploads/img/dummy/icons/top-lines.png') }});
        }
    </style>
    @if (isset($google_analytic))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>
<body class="body-wrapper">

@include('frontend.sections.preloader.preloader')
@include('frontend.sections.header.header-style1')

@yield('content')

@include('frontend.sections.footer.footer-style1')




<!--  ALl JS Plugins
    ====================================== -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.easing.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/imageload.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/metismenu.js') }}"></script>
<script src="{{ asset('assets/frontend/js/active.js') }}"></script>

</body>
</html>
