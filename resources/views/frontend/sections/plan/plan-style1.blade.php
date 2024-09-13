@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Pricing Section Start //-->
                <section class="section bg-primary-light" id="team">
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
                        @isset($plan_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>@php echo html_entity_decode($plan_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($plan_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>Pricing</span>
                                            <h2>Our Pricing</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset

                        @if (is_countable($plans_style1) &&  count($plans_style1) > 0)
                            <div class="row">
                                @foreach ($plans_style1 as $plan)
                                    @if ($plan->recommended == 'no')

                                        <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="plan.edit">
                                                        <input type="hidden" name="single_id" value="{{ $plan->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="pricing-card">
                                                <div class="price-text">
                                                    <h5>{{ $plan->currency }}{{ $plan->price }}</h5>
                                                </div>
                                                <div class="body">
                                                    <div class="pricing-text">
                                                        <h5>{{ $plan->name }}</h5>
                                                        @if (!empty($plan->tag))  <div>
                                                            <span class="extra-text">{{ $plan->tag }} {{ __('frontend.recommended') }}</span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <ul class="pricing-list">
                                                        @if (!empty($plan->feature_list))
                                                            @php
                                                                $str = $plan->feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp

                                                            @foreach ($array_items as $item)
                                                                <li>{{ $item }}</li>
                                                            @endforeach
                                                            @unset ($item)
                                                        @endif
                                                        @if (!empty($plan->non_feature_list))
                                                            @php
                                                                $str = $plan->non_feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp
                                                            @foreach ($array_items as $item)
                                                                <li class="text-decoration-line-through">{{ $item }}</li>
                                                            @endforeach
                                                            @unset ($item)
                                                        @endif
                                                    </ul>
                                                    <a href="{{ $plan->button_url }}" class="primary-btn">
                                                        <span class="text">{{ $plan->button_name }}</span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                    <p class="mt-3 text-white">{{ $plan->extra_text }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    @else

                                        <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="plan.edit">
                                                        <input type="hidden" name="single_id" value="{{ $plan->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="pricing-card">
                                                <div class="price-text">
                                                    <h5>{{ $plan->currency }}{{ $plan->price }}</h5>
                                                </div>
                                                <div class="body">
                                                    <div class="pricing-text">
                                                        <h5>{{ $plan->name }}</h5>
                                                        @if (!empty($plan->tag))  <div>
                                                            <span class="extra-text">{{ $plan->tag }} {{ __('frontend.recommended') }}</span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <ul class="pricing-list">
                                                        @if (!empty($plan->feature_list))
                                                            @php
                                                                $str = $plan->feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp

                                                            @foreach ($array_items as $item)
                                                                <li>{{ $item }}</li>
                                                            @endforeach
                                                            @unset ($item)
                                                        @endif
                                                        @if (!empty($plan->non_feature_list))
                                                            @php
                                                                $str = $plan->non_feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp
                                                            @foreach ($array_items as $item)
                                                                <li class="text-decoration-line-through">{{ $item }}</li>
                                                            @endforeach
                                                            @unset ($item)
                                                        @endif
                                                    </ul>
                                                    <a href="{{ $plan->button_url }}" class="primary-btn">
                                                        <span class="text">{{ $plan->button_name }}</span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                    <p class="mt-3 text-white">{{ $plan->extra_text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @unset ($plan)
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                        <div class="pricing-card">
                                            <div class="price-text">
                                                <h5>$49</h5>
                                            </div>
                                            <div class="body">
                                                <div class="pricing-text">
                                                    <h5>Basic</h5>
                                                    <div>
                                                        <span>Monhtly</span>
                                                    </div>
                                                </div>
                                                <ul class="pricing-list">
                                                    <li>5Gb Bandwith</li>
                                                    <li>7/24 Support</li>
                                                    <li>Free Support</li>
                                                    <li>Special Request</li>
                                                </ul>
                                                <a href="#" class="primary-btn">
                                                    <span class="text">Select Plan</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                        <div class="pricing-card">
                                            <div class="price-text">
                                                <h5>$69</h5>
                                            </div>
                                            <div class="body">
                                                <div class="pricing-text">
                                                    <h5>Business</h5>
                                                    <div>
                                                        <span>Monhtly</span>
                                                    </div>
                                                </div>
                                                <ul class="pricing-list">
                                                    <li>50Gb Bandwith</li>
                                                    <li>7/24 Support</li>
                                                    <li>Free Support</li>
                                                    <li>Special Request</li>
                                                </ul>
                                                <a href="#" class="primary-btn">
                                                    <span class="text">Select Plan</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                        <div class="pricing-card">
                                            <div class="price-text">
                                                <h5>$79</h5>
                                            </div>
                                            <div class="body">
                                                <div class="pricing-text">
                                                    <h5>Premium</h5>
                                                    <div>
                                                        <span>Monhtly</span>
                                                    </div>
                                                </div>
                                                <ul class="pricing-list">
                                                    <li>200Gb Bandwith</li>
                                                    <li>7/24 Support</li>
                                                    <li>Free Support</li>
                                                    <li>Special Request</li>
                                                </ul>
                                                <a href="#" class="primary-btn">
                                                    <span class="text">Select Plan</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
                <!--// Pricing Section End //-->

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
                    <input type="hidden" name="route" value="plan.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="plan.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_plan') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
