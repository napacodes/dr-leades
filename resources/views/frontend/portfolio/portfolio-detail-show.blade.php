<!--// Portfolio Single Section Start //-->
<section class="section" id="portfolio-single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @if(Auth::user())
                    @can('portfolio check')
                        <div class="easier-mode">
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
                            <div class="easier-section-area">
                                @endcan
                                @endif

                                @if (is_countable($portfolio_images) && count($portfolio_images) > 0)
                                    <div class="owl-carousel owl-theme" id="portfolioCarousel">
                                        @foreach ($portfolio_images as $item)
                                            <div class="item">
                                                @if (!empty($item->section_image))
                                                    <img src="{{ asset('uploads/img/portfolio/image/'.$item->section_image) }}" alt="portfolio image" class="img-fluid">
                                                @endif
                                            </div>
                                        @endforeach
                                        @unset ($item)
                                    </div>

                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="owl-carousel owl-theme" id="portfolioCarousel">
                                            <div class="item">
                                                <img src="{{ asset('uploads/img/dummy/800x600.jpg') }}" alt="portfolio image" class="img-fluid">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('uploads/img/dummy/800x600.jpg') }}" alt="portfolio image" class="img-fluid">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('uploads/img/dummy/800x600.jpg') }}" alt="portfolio image" class="img-fluid">
                                            </div>
                                        </div>
                                    @endif
                                @endif

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
                                    <input type="hidden" name="route" value="portfolio-image.create">
                                    <input type="hidden" name="style" value="{{ $portfolio->id }}">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white me-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.add_portfolio_image') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endcan
                @endif

                @if(Auth::user())
                    @can('portfolio check')
                        <div class="easier-mode">
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
                            <div class="easier-section-area">
                                @endcan
                                @endif

                                @isset ($portfolio_content)
                                    <div class="portfolio-single-inner">
                                        <h4>{{ $portfolio->title }}</h4>
                                        <div class="author-meta">
                                            <a href="#"><span class="far fa-calendar-alt"></span>{{ Carbon\Carbon::parse($portfolio->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($portfolio->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($portfolio->created_at)->isoFormat('GGGG') }}</a>
                                            <a href="#"><span class="far fa-bookmark"></span>{{ $portfolio->category_name }}</a>
                                        </div>
                                        <p>@php echo html_entity_decode($portfolio_content->description); @endphp</p>
                                    </div>

                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="portfolio-single-inner">
                                            <h4>Business Card</h4>
                                            <div class="author-meta">
                                                <a href="#"><span class="far fa-user"></span>By Admin</a>
                                                <a href="#"><span class="far fa-bookmark"></span>Mockup</a>
                                            </div>
                                            <p>It is a long established fact that a reader will be distracted by the readable
                                                content of a page when looking at its layout. The point of using Lorem Ipsum is
                                                that it has a more-or-less normal distribution of letters, as opposed to using
                                                'Content here, content here', making it look like readable English. Many desktop
                                                publishing packages and web page editors now use Lorem Ipsum as their default model
                                                text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                                Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                                                (injected humour and the like).
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 portfolio-grid-img">
                                                    <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                                </div>
                                                <div class="col-md-6 col-sm-6 portfolio-grid-img">
                                                    <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endisset

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
                                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_portfolio_content') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endcan
                @endif

            </div>

            <div class="col-lg-4 col-md-12">
                <div class="widget-sidebar">

                    @if(Auth::user())
                        @can('portfolio check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    <div class="sidebar-widgets">
                                        @isset ($portfolio_detail_section)
                                            <h5 class="inner-header-title">{{ $portfolio_detail_section->title }}</h5>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                <h5 class="inner-header-title">Portfolio Details</h5>
                                            @endif
                                        @endisset
                                        @if (is_countable($portfolio_details) && count($portfolio_details) > 0)
                                            <div class="sidebar-details-list">
                                                <ul>
                                                    @foreach ($portfolio_details as $item)
                                                        <li>
                                                            @if(Auth::user())
                                                                @can('portfolio check')
                                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                                        @csrf
                                                                        <input type="hidden" name="route" value="portfolio-detail.edit">
                                                                        <input type="hidden" name="style" value="">
                                                                        <input type="hidden" name="portfolio_id" value="{{ $portfolio->id }}">
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                                        <button type="submit" class="me-2 custom-pure-button">
                                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            @endif
                                                            <h6>{{ $item->title }}<span>{{ $item->description }}</span></h6>
                                                        </li>
                                                    @endforeach
                                                    @unset ($item)
                                                </ul>
                                            </div>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                <div class="sidebar-details-list">
                                                    <ul>
                                                        <li><h6>Project Name<span>Business Card</span></h6></li>
                                                        <li><h6>Project Category<span>Mockup</span></h6></li>
                                                        <li><h6>Project Value<span>$150</span></h6></li>
                                                        <li><h6>Customer<span>ElseColor</span></h6></li>
                                                        <li><h6>Created Date<span>20 December 2024</span></h6></li>
                                                        <li><h6>End Date<span>28 December 2024</span></h6></li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

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
                                        <input type="hidden" name="route" value="portfolio-detail.create">
                                        <input type="hidden" name="style" value="{{ $portfolio->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="route" value="portfolio-detail.create">
                                        <input type="hidden" name="style" value="{{ $portfolio->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_portfolio_detail') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endcan
                    @endif

                    @if(Auth::user())
                        @can('portfolio check')
                            <div class="easier-mode">
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    <div class="sidebar-widgets">
                                        <h5 class="inner-header-title">{{ __('content.categories') }}</h5>
                                        <ul class="sidebar-category-list clearfix">
                                            @foreach ($portfolio_count_categories as $portfolio_count_category)
                                                @if (isset($portfolio_count_category->portfolio_category->portfolio_category_slug))
                                                    @if (!empty($portfolio_category_index->page_uri))
                                                        <li class="@if ($portfolio_count_category->portfolio_category->category_name == $portfolio->category_name) active @endif"><a href="{{ url($portfolio_category_index->page_uri.'/'.$portfolio_count_category->portfolio_category->portfolio_category_slug) }}">{{$portfolio_count_category->portfolio_category->category_name }} <span class="category-count">({{ $portfolio_count_category->category_count }})</span></a></li>
                                                    @else
                                                        <li class="@if ($portfolio_count_category->portfolio_category->category_name == $portfolio->category_name) active @endif"><a href="{{ route('default-portfolio-category-index', $portfolio_count_category->portfolio_category->portfolio_category_slug) }}">{{$portfolio_count_category->portfolio_category->category_name }} <span class="category-count">({{ $portfolio_count_category->category_count }})</span></a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

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
                                        <input type="hidden" name="route" value="portfolio-category.create">
                                        <input type="hidden" name="style" value="">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_portfolio_category') }}
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endcan
                    @endif

                    @if (count($recent_portfolios) > 0)
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.recent_portfolio') }}</h5>
                            @foreach ($recent_portfolios as $item)
                                <div class="recent-post-item clearfix">
                                    <div class="recent-post-img mr-3">
                                        @if (!empty($item->url))
                                            <a href="{{ $item->url }}">
                                                @if (!empty($item->section_image))
                                                    <img src="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" class="img-fluid image-size-100" alt="portfolio image">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="portfolio image">
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('default-portfolio-detail-show', ['portfolio_slug' => $item->portfolio_slug]) }}">
                                                @if (!empty($item->section_image))
                                                    <img src="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" class="img-fluid image-size-100" alt="portfolio image">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="portfolio image">
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                    <div class="recent-post-body">
                                        @if (!empty($portfolio_detail_show->page_uri))
                                            <a href="{{ url($portfolio_detail_show->page_uri.'/'.$item->portfolio_slug) }}">
                                                <h6 class="recent-post-title">{{ $item->title }}</h6>
                                            </a>
                                        @else
                                            <a href="{{ route('default-portfolio-detail-show', ['portfolio_slug' => $item->portfolio_slug]) }}">
                                                <h6 class="recent-post-title">{{ $item->title }}</h6>
                                            </a>
                                        @endif
                                        <p class="recent-post-date"><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($item->created_at)->isoFormat('GGGG') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">{{ __('frontend.copy_link_and_share') }}</h5>
                        <ul class="sidebar-share clearfix">
                            <li>
                                <div style="display: none;" id="hiddenURLDiv"></div>
                                <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link fa-facebook-f"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--// Portfolio Single Section End //-->




