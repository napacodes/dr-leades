@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Testimonial Section Start //-->
                <section class="section pb-minus-76 bg-primary-light">
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
                        @isset ($testimonial_section_style1)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>@php echo html_entity_decode($testimonial_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($testimonial_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>Testimonial</span>
                                        <h2>Our Clients</h2>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endisset
                        @if (is_countable($testimonials_style1) && count($testimonials_style1) > 0)
                            <div class="owl-carousel owl-theme" id="testimonialCarousel">
                                @foreach ($testimonials_style1 as $item)
                                    <div class="item">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="testimonial.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="testimonial-item">
                                            @if (!empty($item->section_image))
                                                <div class="img">
                                                    <img src="{{ asset('uploads/img/testimonial/'.$item->section_image) }}" alt="Testimonial image" class="img-fluid">
                                                </div>
                                            @endif
                                            <div class="body">
                                                <h5>{{ $item->name }}</h5>
                                                <span>{{ $item->job }}</span>
                                                <p>{{ $item->description }}</p>
                                                <div class="rating">
                                                    @for ($t = 0; $t < $item->star; $t++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($t = 0; $t < 5-$item->star; $t++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="owl-carousel owl-theme" id="testimonialCarousel">
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/80x80.jpg') }}" alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>Jeff N. Hood</h5>
                                            <span>New Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/80x80.jpg') }}" alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>James E. Nelson</h5>
                                            <span>New Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/80x80.jpg') }}" alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>Wallace Chuck</h5>
                                            <span>New Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/80x80.jpg') }}" alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>Nitin Khajotia</h5>
                                            <span>New Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                    </div>
                                </div>
                            </div>
                                @endif
                        @endif
                    </div>
                </section>
                <!--// Testimonial Section End //-->

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
                    <input type="hidden" name="route" value="testimonial.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="testimonial.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_testimonial') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
