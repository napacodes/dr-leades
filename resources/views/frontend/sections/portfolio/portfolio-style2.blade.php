@if(Auth::user())
    @can('portfolio check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// My Works Start //-->
                <section class="section bg-primary-light">
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
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_countable($portfolio_count_categories) && count($portfolio_count_categories) > 0)
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="{{ url($page_builder->page_uri) }}" class="current mb-2">{{ __('frontend.all_portfolio') }}</a>
                                        @foreach ($portfolio_count_categories as $portfolio_count_category)
                                            @if (isset($portfolio_count_category->portfolio_category->portfolio_category_slug))
                                                    <a class="mb-2" href="{{ route('default-portfolio-category-index', $portfolio_count_category->portfolio_category->portfolio_category_slug) }}">{{$portfolio_count_category->portfolio_category->category_name }} ({{ $portfolio_count_category->category_count }})</a>
                                            @endif
                                        @endforeach
                                        @unset ($portfolio_count_category)
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="#" class="link-dark">Creative</a>
                                        <a href="#" class="link-secondary">Business</a>
                                        <a href="#" class="link-secondary">UI / UX Design</a>
                                        <a href="#" class="link-secondary">Marketing</a>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if (is_countable($portfolios_paginate_style) && count($portfolios_paginate_style) > 0)
                            <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                                @foreach ($portfolios_paginate_style as $item)
                                    <div class="col-md-6 col-lg-4 portfolio-item {{ $item->portfolio_category->portfolio_category_slug }}">
                                        @if(Auth::user())
                                            @can('portfolio check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="portfolio.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="portfolio-item-inner">
                                            @if (!empty($item->section_image))
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" alt="Portfolio image" class="img-fluid">
                                                    <a href="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" class="portfolio-zoom-link">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="body">
                                                <div class="portfolio-details">
                                                    <span>{{ $item->portfolio_category->category_name }}</span>
                                                    <h5>{{ $item->title }}</h5>
                                                </div>
                                                @if (!empty($item->url))
                                                    <a href="{{ $item->url }}" class="portfolio-link">
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('default-portfolio-detail-show', ['portfolio_slug' => $item->portfolio_slug]) }}" class="portfolio-link">
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="row mt-5">
                                <div class="col-xl-12">
                                    <div class="easier-pagination-container">
                                        {{ $portfolios_paginate_style->links() }}
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Card Mockup</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Mockup Box</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Coffee Mockup</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Square Box</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item ui">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Ui Design</span>
                                                <h5>Paper Design</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Business Card</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endif

                    </div>
                </section>
                <!--// My Works End //-->

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
                    <input type="hidden" name="route" value="portfolio.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}</button>
                </form>

                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="portfolio.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.add_portfolio') }}</button>
                </form>

            </div>
        </div>
    @endcan
@endif
