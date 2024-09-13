@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                    <!--// Hero Section Start //-->
                    <section class="hero-banner" data-scroll-index="1">
                        <div class="container">
                            @if(Auth::user())
                                @can('section check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row align-items-center">
                                @isset ($banner_style1)
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>@php echo html_entity_decode($banner_style1->title); @endphp</h1>
                                            <h2>@php echo html_entity_decode($banner_style1->description); @endphp</h2>
                                            @if (!empty($banner_style1->button_name))
                                                <a href="{{ $banner_style1->button_url }}" class="white-btn me-md-3 mb-3">
                                                    <span class="text">{{ $banner_style1->button_name }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                            @if (!empty($banner_style1->button_name_2))
                                                <a href="{{ $banner_style1->button_url_2 }}" class="white-btn">
                                                    <span class="text">{{ $banner_style1->button_name_2 }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        @if (!empty($banner_style1->section_image))
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                        <img src="{{ asset('uploads/img/banner/'.$banner_style1->section_image) }}" title="banner image" alt="banner image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                            <div class="hero-inner">
                                                <h1>
                                                    Introduce Our
                                                    Creative Agency.
                                                </h1>
                                                <h2>
                                                    Always new beginnings can move the business forward.A user experience is
                                                    required before service.Now is a great opportunity to work with our and move
                                                    your brand forward.
                                                </h2>
                                                <a href="#" data-scroll-nav="4"  class="white-btn">
                                                    <span class="text">View Works</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="{{ asset('uploads/img/dummy/354x354.jpg') }}" title="banner image" alt="banner image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endisset
                            </div>
                        </div>
                        @if (is_countable($socials) && count($socials) > 0)
                            <ul class="hero-social-list">
                                @foreach ($socials as $social)
                                    @if ($social->social_media == 'fab fa-twitter')
                                        <li><a href="{{ $social->url }}"><img src="{{ asset('uploads/img/dummy/x-twitter-white.svg') }}" alt="x icon"></a></li>
                                    @else
                                        <li><a href="{{ $social->url }}"><i class="{{ $social->social_media }}"></i></a></li>
                                    @endif
                                @endforeach
                                @unset ($social)
                            </ul>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <ul class="hero-social-list">
                                    <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            @endif
                        @endif

                        @isset ($header_info_style1)
                            <a href="mailto:{{ $header_info_style1->email }}" class="hero-email-link">{{ $header_info_style1->email }}</a>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <a href="mailto:elsecolor@example.com" class="hero-email-link">elsecolor@example.com</a>
                            @endif
                        @endisset
                    </section>
                    <!--// Hero Section End //-->


                @if(Auth::user())
                    @can('section check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="banner.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_banner') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="social.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-plus text-white"></i> {{ __('content.edit_social') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="header-info.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.edit_email') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
