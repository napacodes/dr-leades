@if(Auth::user())
    @can('portfolio check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// My Works Start //-->
                <section class="section bg-primary-light" id="porfolio">
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
                            @isset ($portfolio_section_style1)
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>@php echo html_entity_decode($portfolio_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($portfolio_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>Works</span>
                                        <h2>Our Works</h2>
                                    </div>
                                </div>
                                @endif
                            @endisset
                                @if (is_countable($portfolios_style1) && count($portfolios_style1) > 0)
                                    <div class="col-md-6">
                                        <div class="portfolio-filter">
                                            @foreach ($portfolio_count_categories as $portfolio_category)
                                                <a href="#" data-portfolio-filter=".{{ $portfolio_category->portfolio_category->portfolio_category_slug }}">{{ $portfolio_category->portfolio_category->category_name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-md-6">
                                        <div class="portfolio-filter">
                                            <a href="#" data-portfolio-filter="*" class="current">All</a>
                                            <a href="#" data-portfolio-filter=".mockup">Mockup</a>
                                            <a href="#" data-portfolio-filter=".ui">UI/UX</a>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                        </div>
                        @if (is_countable($portfolios_style1) && count($portfolios_style1) > 0)
                            <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                                @foreach ($portfolios_style1 as $item)
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
                        <div class="row">
                            @isset ($portfolio_section_style1)
                                <div class="col-md-12 text-center">
                                    <a href="{{ $portfolio_section_style1->button_url }}" class="primary-btn">
                                        <span class="text">{{ $portfolio_section_style1->button_name }}</span>
                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-md-12 text-center">
                                        <a href="javascript:void(0)" class="primary-btn">
                                            <span class="text">Get Started</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </div>
                                @endif
                            @endisset
                        </div>

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
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="portfolio.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_portfolio') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
