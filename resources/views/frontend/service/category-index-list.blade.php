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
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_countable($service_count_categories) && count($service_count_categories) > 0)
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="{{ url($service_index->page_uri) }}" class="mb-2">{{ __('frontend.all_services') }}</a>
                                        @foreach ($service_count_categories as $service_count_category)
                                            @if (isset($service_count_category->service_category->service_category_slug))
                                                <a class="@if ($category->category_name == $service_count_category->service_category->category_name) current @endif mb-2" href="{{ route('default-service-category-index', $service_count_category->service_category->service_category_slug) }}">{{$service_count_category->service_category->category_name }} ({{ $service_count_category->category_count }})</a>
                                            @endif
                                        @endforeach
                                        @unset ($service_count_category)
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
                        @if (is_countable($services_paginate_style) && count($services_paginate_style) > 0)
                            <div class="row">
                                @foreach ($services_paginate_style as $item)
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
                                                        <img src="{{ asset('uploads/img/service/'.$item->section_image) }}" alt="service icon">
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="easier-pagination-container">
                                        {{ $services_paginate_style->links() }}
                                    </div>
                                </div>
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
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}</button>
                </form>

                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="service.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.add_service') }}</button>
                </form>

            </div>
        </div>
    @endcan
@endif
