@if ($page_builder->page_name == 'blog-index' && isset($blog_section))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        @isset ($blog_section)
                                            <h1>{{ $blog_section->breadcrumb_title }}</h1>
                                        @else
                                            <h1>{{ __('content.our_blogs') }}</h1>
                                        @endisset
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            @isset ($blog_section)
                                                @php
                                                    $str = $blog_section->breadcrumb_item;
                                                    $array_items = explode(",",$str);
                                                @endphp
                                                @foreach ($array_items as $item)
                                                    @if (!$loop->last)
                                                        <li class="breadcrumb-item">@php echo html_entity_decode($item); @endphp</li>
                                                    @else
                                                        <li class="breadcrumb-item text-white active" aria-current="page">@php echo html_entity_decode($item); @endphp</li>
                                                    @endif
                                                @endforeach
                                                @unset($item)
                                            @else
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                                <li class="breadcrumb-item text-white active" aria-current="page">{{ __('content.our_blogs') }}</li>
                                            @endisset
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
                    </div>

                    @if(Auth::user())
                        @can('blog check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="blog.index">
                        <input type="hidden" name="style" value="">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'service-detail-show' && isset($service))

    @if(Auth::user())
        @can('service check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($service_content->custom_breadcrumb_image))
                                 @if ($service_content->breadcrumb_status == 'yes')
                                     data-bg-image-path="{{ asset('uploads/img/service/breadcrumb/'.$service_content->custom_breadcrumb_image) }}"
                             @endif
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('service check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $service->title }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $service->title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('service check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp

                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="service-content.create">
                        <input type="hidden" name="style" value="{{ $service->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'service-category-index' && isset($category))

    @if(Auth::user())
        @can('service check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($page_builder->custom_breadcrumb_image) && $page_builder->breadcrumb_status == 'yes')
                                 data-bg-image-path="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}"
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('service check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $category->category_name }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $category->category_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('service check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'team-category-index' && isset($category))

    @if(Auth::user())
        @can('team check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($page_builder->custom_breadcrumb_image) && $page_builder->breadcrumb_status == 'yes')
                                 data-bg-image-path="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}"
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('team check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $category->category_name }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $category->category_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('team check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'portfolio-detail-show' && isset($portfolio))

    @if(Auth::user())
        @can('portfolio check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($portfolio_content->custom_breadcrumb_image))
                                 @if ($portfolio_content->breadcrumb_status == 'yes')
                                     data-bg-image-path="{{ asset('uploads/img/portfolio/breadcrumb/'.$portfolio_content->custom_breadcrumb_image) }}"
                             @endif
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('portfolio check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $portfolio->title }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $portfolio->title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('portfolio check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp

                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="portfolio-content.create">
                        <input type="hidden" name="style" value="{{ $portfolio->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'portfolio-category-index' && isset($category))

    @if(Auth::user())
        @can('portfolio check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($page_builder->custom_breadcrumb_image) && $page_builder->breadcrumb_status == 'yes')
                                 data-bg-image-path="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}"
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('portfolio check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $category->category_name }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $category->category_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('portfolio check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-detail-show' && isset($blog))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($blog->custom_breadcrumb_image))
                                 @if ($blog->breadcrumb_status == 'yes')
                                     data-bg-image-path="{{ asset('uploads/img/blog/breadcrumb/'.$blog->custom_breadcrumb_image) }}"
                             @endif
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('blog check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $blog->title }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $blog->title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('blog check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp

                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="blog.create">
                        <input type="hidden" name="style" value="{{ $blog->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-category-index' && isset($category))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($page_builder->custom_breadcrumb_image) && $page_builder->breadcrumb_status == 'yes')
                                 data-bg-image-path="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}"
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('blog check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $category->category_name }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $category->category_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('blog check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-tag-index' && isset($tag_name))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($page_builder->custom_breadcrumb_image) && $page_builder->breadcrumb_status == 'yes')
                                 data-bg-image-path="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}"
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('blog check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $tag_name }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $tag_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('blog check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'career-detail-show' && isset($career))

    @if(Auth::user())
        @can('career check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($career_content->custom_breadcrumb_image))
                                 @if ($career_content->breadcrumb_status == 'yes')
                                     data-bg-image-path="{{ asset('uploads/img/career/breadcrumb/'.$career_content->custom_breadcrumb_image) }}"
                             @endif
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('career check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $career->title }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $career->title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('career check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp

                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="service-content.create">
                        <input type="hidden" name="style" value="{{ $career->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'career-detail-show' && isset($page))

    @if(Auth::user())
        @can('page check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1"
                             @if (!empty($page->custom_breadcrumb_image))
                                 @if ($page->breadcrumb_status == 'yes')
                                     data-bg-image-path="{{ asset('uploads/img/page/breadcrumb/'.$page->custom_breadcrumb_image) }}"
                             @endif
                             @elseif (!empty($breadcrumb_image->section_image))
                                 data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('page check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $page->title }}</h1>
                                        <ul class="breadcrumb-links">
                                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="active">{{ $page->title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('page check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp

                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="service-content.create">
                        <input type="hidden" name="style" value="{{ $page->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@else

    @if(Auth::user())
        @can('page builder check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif

                    <!--// Breadcrumb Section Start //-->
                    <section class="breadcrumb-section section" data-scroll-index="1" @if (!empty($page_builder->custom_breadcrumb_image) && $page_builder->breadcrumb_status == 'yes')
                        data-bg-image-path="{{ asset('uploads/img/page_builder/breadcrumb/'.$page_builder->custom_breadcrumb_image) }}"
                             @elseif (!empty($breadcrumb_image->section_image))
                        data-bg-image-path="{{ asset('uploads/img/breadcrumb/'.$breadcrumb_image->section_image) }}"
                        @endif>
                        <div class="container">
                            @if(Auth::user())
                                @can('page builder check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="breadcrumb-inner">
                                        <h1>{{ $page_builder->breadcrumb_title }}</h1>
                                        @php
                                            $str = $page_builder->breadcrumb_item;
                                            $array_items = explode(",",$str);
                                        @endphp
                                        <ul class="breadcrumb-links">
                                            @foreach ($array_items as $item)
                                                @if (!$loop->last)
                                                    <li>@php echo html_entity_decode($item); @endphp</li>
                                                @else
                                                    <li class="active">@php echo html_entity_decode($item); @endphp</li>
                                                @endif
                                            @endforeach
                                            @unset($item)
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Breadcrumb Section end //-->

                    @if(Auth::user())
                        @can('page builder check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@endif
