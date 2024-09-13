@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @if (is_countable($sponsors_style1) && count($sponsors_style1) > 0)
                <!--// Partners Section Start //-->
                <div class="partners-section section">
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
                        <div class="owl-carousel owl-theme" id="partners-carousel">
                            @foreach ($sponsors_style1 as $item)
                                <div class="item">
                                    @if(Auth::user())
                                        @can('section check')
                                            @php
                                                $url = request()->path();
                                                $modified_url = str_replace('/', '-bracket-', $url);
                                            @endphp
                                            <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="route" value="sponsor.edit">
                                                <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                <button type="submit" class="me-2 custom-pure-button ">
                                                    <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    @endif
                                    <div class="partner-item">
                                        <a href="{{ $item->url }}">
                                            <img src="{{ asset('uploads/img/sponsor/'.$item->section_image) }}" alt="sponsor image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            @unset ($item)
                        </div>
                    </div>
                </div>
                <!--// Partners Section End  //-->
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <!--// Partners Section Start //-->
                    <div class="partners-section section">
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
                            <div class="owl-carousel owl-theme" id="partners-carousel">
                                <div class="item">
                                    <div class="partner-item">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/170x75.jpg') }}" alt="sponsor image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="partner-item">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/170x75.jpg') }}" alt="sponsor image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="partner-item">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/170x75.jpg') }}" alt="sponsor image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="partner-item">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/170x75.jpg') }}" alt="sponsor image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="partner-item">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/170x75.jpg') }}" alt="sponsor image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Partners Section End  //-->
                    @endif
                @endif

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
                    <input type="hidden" name="route" value="sponsor.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_sponsor') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
