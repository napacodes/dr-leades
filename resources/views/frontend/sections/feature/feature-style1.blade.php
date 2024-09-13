@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Resume Section Start //-->
                <section class="section pb-minus-76 bg-primary-light" id="myresume">
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
                        @isset ($feature_section_style1)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-heading-left">
                                        <span>@php echo html_entity_decode($feature_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($feature_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="section-heading-left">
                                            <span>Feature</span>
                                            <h2>Our Features</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset
                        @if (is_countable($features_style1) && count($features_style1) > 0)
                            <div class="row">
                                @foreach ($features_style1 as $item)
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->iteration }}s">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="feature.edit">
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
                                                    <img src="{{ asset('uploads/img/feature/'.$item->section_image) }}" class="me-3 img-fluid custom-max-width-110" alt="feature image">
                                                @endif
                                                <div class="text">
                                                    <h6>@php echo html_entity_decode($item->subtitle); @endphp</h6>
                                                    <h5>@php echo html_entity_decode($item->title); @endphp</h5>
                                                    <span>@php echo html_entity_decode($item->description); @endphp</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
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
                                                    <span>2018-2024</span>
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
                                                    <span>2016-2018</span>
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
                                                    <span>2012-2014</span>
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
                                                    <span>2017-2019</span>
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
                                                    <span>2012-2014</span>
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
                                                    <span>2012-2014</span>
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
                    @can('section check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="feature.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="feature.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_feature') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
