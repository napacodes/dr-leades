@if(Auth::user())
    @can('gallery check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// My Works Start //-->
                <section class="section bg-primary-light" id="porfolio">
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
                        @isset($gallery_image_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>@php echo html_entity_decode($gallery_image_section_style1->title); @endphp</span>
                                        <h2>@php echo html_entity_decode($gallery_image_section_style1->description); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>Gallery</span>
                                            <h2>See all images</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset
                        @if (is_countable($gallery_images_style1) && count($gallery_images_style1) > 0)
                            <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                                @foreach ($gallery_images_style1 as $item)
                                    <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                        @if(Auth::user())
                                            @can('gallery check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="gallery.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="portfolio-item-inner">
                                            <div class="portfolio-item-img">
                                                @if (!empty($item->section_image))
                                                    <img src="{{ asset('uploads/img/gallery/'.$item->section_image) }}" alt="Portfolio image" class="img-fluid">
                                                    <a href="{{ asset('uploads/img/gallery/'.$item->section_image) }}" class="portfolio-zoom-link">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                                    <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                @endif

                                            </div>
                                            <div class="body">
                                                <div class="portfolio-details">
                                                    <span>{{ $item->subtitle }}</span>
                                                    <h5>{{ $item->title }}</h5>
                                                </div>
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
                    @can('gallery check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="gallery.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="gallery.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_gallery') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
