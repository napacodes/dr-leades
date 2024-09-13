@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Counter Section Start //-->
                <section class="section pb-minus-70" id="counters">
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
                        @isset ($counter_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading light">
                                        <span>@php echo html_entity_decode($counter_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($counter_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading light">
                                        <span>Counters</span>
                                        <h2>More than 10,000 customers trusted me</h2>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endisset
                        @if (is_countable($counters_style1) && count($counters_style1) > 0)
                            <div class="row">
                                @foreach ($counters_style1 as $item)
                                    <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                        <div class="counter-item">
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="counter.edit">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <h3 class="counter">{{ $item->timer }}</h3>
                                            <p>{{ $item->title }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                    <div class="counter-item">
                                        <h3 class="counter">5,700</h3>
                                        <p>Happy Customer</p>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                    <div class="counter-item">
                                        <h3 class="counter">500</h3>
                                        <p>Project Complete</p>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                    <div class="counter-item">
                                        <h3 class="counter">1,250</h3>
                                        <p>Cups Of Coffee</p>
                                    </div>
                                </div>
                            </div>
                                @endif
                        @endif
                    </div>
                </section>
                <!--// Counter Section End //-->

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
                    <input type="hidden" name="route" value="counter.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="counter.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_counter') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
