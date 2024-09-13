<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Page is not found</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@if (!empty($page_builder->meta_title)) {{ $page_builder->meta_title }} @elseif  (isset($seo)) {{ $seo->meta_title }} @endif</title>

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
<body data-bs-spy="scroll" data-bs-target="#fixedNavbar">

<section class="error-404-wrapper section-padding mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="error-content">
                    <img src="{{ asset('uploads/img/dummy/404.png') }}" alt="404 image">
                    <h1 class="mt-5 mb-3">Oops! Page not found.</h1>
                    <p>Sorry, an error has occured, Requested page not found!</p>
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg mt-50">Back To Homepage</a>
                </div>
                <div class="leaf"><img src="{{ asset('uploads/img/dummy/leaf.png') }}" alt="leaf image"></div>
                <div class="leaf-copy"><img src="{{ asset('uploads/img/dummy/leaf.png') }}" alt="leaf image"></div>
            </div>
        </div>
    </div>
</section>


</body>
</html>

