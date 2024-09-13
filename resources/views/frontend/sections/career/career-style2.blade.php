@if(Auth::user())
    @can('career check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Resume Section Start //-->
                <section class="section pb-minus-76 bg-primary-light" id="myresume">
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
                        @if (is_countable($careers_paginate_style) && count($careers_paginate_style) > 0)
                            <div class="row">
                                @foreach ($careers_paginate_style as $item)
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->iteration }}s">
                                        @if(Auth::user())
                                            @can('career check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="career.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="resume-item">
                                            <div class="body">
                                                @if ($item->type == "icon")
                                                    @if (!empty($item->icon))
                                                        <div class="icon-outer-line">
                                                            <div class="icon-inner-line">
                                                                <span class="{{ $item->icon }}"></span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <img src="{{ asset('uploads/img/career/'.$item->section_image) }}" class="me-3 img-fluid" alt="feature image">
                                                @endif
                                                <div class="text">
                                                    <h6>{{ $item->category_name }}</h6>
                                                    <h5>{{ $item->title }}</h5>
                                                    <span>{{ $item->short_description }}</span>
                                                    @if (!empty($item->button_name))
                                                        <div class="btn-box">
                                                            <a href="{{ $item->button_url }}">{{ $item->button_name }} <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    @else
                                                        <div class="btn-box">
                                                                <a href="{{ route('default-career-detail-show', ['career_slug' => $item->career_slug]) }}">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="easier-pagination-container">
                                            {{ $careers_paginate_style->links() }}
                                        </div>
                                    </div>
                                </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                        <div class="resume-item">
                                            <div class="body">
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="fab fa-google"></span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h6>Google LLC</h6>
                                                    <h5>Web Designer</h5>
                                                    <span>Sed volutpat pellentesque nulla ut posuere. Nunc ac felis in elit sodales porta et id arcu.</span>
                                                    <div class="btn-box">
                                                        <a href="#">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                        <div class="resume-item">
                                            <div class="body">
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="fab fa-wordpress"></span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h6>Wordpress</h6>
                                                    <h5>Web Developer</h5>
                                                    <span>Sed volutpat pellentesque nulla ut posuere. Nunc ac felis in elit sodales porta et id arcu.</span>
                                                    <div class="btn-box">
                                                        <a href="#">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.3s">
                                        <div class="resume-item">
                                            <div class="body">
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="fab fa-dribbble"></span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h6>Dribbble</h6>
                                                    <h5>UI Designer</h5>
                                                    <span>Sed volutpat pellentesque nulla ut posuere. Nunc ac felis in elit sodales porta et id arcu.</span>
                                                    <div class="btn-box">
                                                        <a href="#">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.4s">
                                        <div class="resume-item">
                                            <div class="body">
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="fab fa-youtube"></span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h6>Youtube LLC</h6>
                                                    <h5>Seo Manager</h5>
                                                    <span>Sed volutpat pellentesque nulla ut posuere. Nunc ac felis in elit sodales porta et id arcu.</span>
                                                    <div class="btn-box">
                                                        <a href="#">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                        <div class="resume-item">
                                            <div class="body">
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="fab fa-amazon"></span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h6>Amazon</h6>
                                                    <h5>Sales Manager</h5>
                                                    <span>Sed volutpat pellentesque nulla ut posuere. Nunc ac felis in elit sodales porta et id arcu.</span>
                                                    <div class="btn-box">
                                                        <a href="#">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.6s">
                                        <div class="resume-item">
                                            <div class="body">
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="fab fa-behance"></span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h6>Behance</h6>
                                                    <h5>Graphic Designer</h5>
                                                    <span>Sed volutpat pellentesque nulla ut posuere. Nunc ac felis in elit sodales porta et id arcu.</span>
                                                    <div class="btn-box">
                                                        <a href="#">{{ __('frontend.read_more') }}  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
                <!--// Resume Section End //-->

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
                    <input type="hidden" name="route" value="career.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="career.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_career') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
