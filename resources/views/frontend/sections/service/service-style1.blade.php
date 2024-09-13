@if(Auth::user())
    @can('service check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Services Section Start //-->
                <section class="section pb-minus-70">
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
                        @isset ($service_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>@php echo html_entity_decode($service_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($service_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>Services</span>
                                        <h2>Our Services</h2>
                                    </div>
                                </div>
                            </div>
                                @endif
                        @endisset
                            @if (is_countable($services_style1) && count($services_style1) > 0)
                                <div class="row">
                                    @foreach ($services_style1 as $item)
                                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->iteration }}s">
                                            @if(Auth::user())
                                                @can('service check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="service.edit">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="services-item">
                                                @if (!empty($item->section_image_2))
                                                <img src="{{ asset('uploads/img/service/'.$item->section_image_2) }}" alt="Services image" class="services-bg-img">
                                                @endif
                                                    <div class="body">
                                                    <h4>0{{$loop->index + 1 }}</h4>
                                                    <h5>{{ $item->title }}</h5>
                                                    <p>{{ $item->short_description }}</p>
                                                    @if (!empty($item->button_name))
                                                        <div class="btn-box">
                                                            <a href="{{ $item->button_url }}">{{ $item->button_name }} <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    @else
                                                        <div class="btn-box">
                                                            <a href="{{ route('default-service-detail-show', ['service_slug' => $item->service_slug]) }}">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                               @if ($item->type == 'icon')
                                                    @if (!empty($item->icon))
                                                        <div class="icon">
                                                            <span class="{{ $item->icon }}"></span>
                                                        </div>
                                                        <div class="icon-border"></div>
                                                    @endif
                                                @else
                                                    @if (!empty($item->section_image))
                                                        <div class="icon">
                                                           <img class="custom-max-width-80" src="{{ asset('uploads/img/service/'.$item->section_image) }}" alt="service icon">
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    @unset ($item)
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                        <div class="services-item">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Services image" class="services-bg-img">
                                            <div class="body">
                                                <h4>01</h4>
                                                <h5>Web Design</h5>
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when
                                                    looking at its layout.
                                                </p>
                                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <span class="fa fa-tablet"></span>
                                            </div>
                                            <div class="icon-border"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                        <div class="services-item">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Services image" class="services-bg-img">
                                            <div class="body">
                                                <h4>02</h4>
                                                <h5>Graphic Design</h5>
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when
                                                    looking at its layout.
                                                </p>
                                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <span class="fa fa-adjust"></span>
                                            </div>
                                            <div class="icon-border"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                        <div class="services-item">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Services image" class="services-bg-img">
                                            <div class="body">
                                                <h4>03</h4>
                                                <h5>UI/UX Design</h5>
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when
                                                    looking at its layout.
                                                </p>
                                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <span class="fab fa-uikit"></span>
                                            </div>
                                            <div class="icon-border"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                        <div class="services-item">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Services image" class="services-bg-img">
                                            <div class="body">
                                                <h4>04</h4>
                                                <h5>Content Writing</h5>
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when
                                                    looking at its layout.
                                                </p>
                                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <span class="fa fa-blog"></span>
                                            </div>
                                            <div class="icon-border"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                        <div class="services-item">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Services image" class="services-bg-img">
                                            <div class="body">
                                                <h4>05</h4>
                                                <h5>Scripts & Plugin</h5>
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when
                                                    looking at its layout.
                                                </p>
                                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <span class="fa fa-code"></span>
                                            </div>
                                            <div class="icon-border"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                        <div class="services-item">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Services image" class="services-bg-img">
                                            <div class="body">
                                                <h4>06</h4>
                                                <h5>Digital Marketing</h5>
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when
                                                    looking at its layout.
                                                </p>
                                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <span class="fa fa-bullhorn"></span>
                                            </div>
                                            <div class="icon-border"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                        <div class="row">
                            @isset ($service_section_style1)
                                <div class="col-md-12 text-center">
                                    <a href="{{ $service_section_style1->button_url }}" class="primary-btn">
                                        <span class="text">{{ $service_section_style1->button_name }}</span>
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
                <!--// Services Section End //-->

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
                    <input type="hidden" name="route" value="service.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="service.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_service') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
