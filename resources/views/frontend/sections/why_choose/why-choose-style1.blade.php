@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Skills Section Start //-->
                <section class="section">
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
                        <div class="row">
                            @isset ($why_choose_section_style1)
                                @if (!empty($why_choose_section_style1->section_image))
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                        <div class="skills-img">
                                            <img src="{{ asset('uploads/img/why_choose/'.$why_choose_section_style1->section_image) }}" alt="About image" title="why choose image" class="img-fluid">
                                            <span class="icon-check"><i class="fa fa-check"></i></span>
                                            <div class="icon-border-line"></div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                        <div class="skills-img">
                                            <img src="{{ asset('uploads/img/dummy/480x600.jpg') }}" alt="About image" title="About image" class="img-fluid">
                                            <span class="icon-check"><i class="fa fa-check"></i></span>
                                            <div class="icon-border-line"></div>
                                        </div>
                                    </div>
                                @endif
                            @endisset
                            <div class="col-lg-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                <div class="skills-inner">
                                    @isset ($why_choose_section_style1)
                                        <h6>@php echo html_entity_decode($why_choose_section_style1->section_title); @endphp</h6>
                                        <h2>@php echo html_entity_decode($why_choose_section_style1->title); @endphp</h2>
                                        <p>@php echo html_entity_decode($why_choose_section_style1->description); @endphp</p>
                                        @if (!empty($why_choose_section_style1->item))
                                            @php
                                                $str = $why_choose_section_style1->item;
                                                $array_items = explode(",",$str);
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <ul class="mb-resp-15">
                                                        @foreach($array_items as $index => $item)
                                                            @if($index < count($array_items) / 2)
                                                                <li>{{ $item }}</li>
                                                            @endif
                                                        @endforeach
                                                        @unset ($item)
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <ul>
                                                        @foreach($array_items as $index => $item)
                                                            @if($index >= count($array_items) / 2)
                                                                <li>{{ $item }}</li>
                                                            @endif
                                                        @endforeach
                                                        @unset ($item)
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <h6>Why Choose Us</h6>
                                            <h2>We are specialize in frameworks UI for years</h2>
                                            <p>
                                                A front end library is being released every day and it is requested
                                                to master these technologies.I also follow the market every day and
                                                follow the updates of new frontend frameworks and programming frameworks.
                                                It is easier for me to keep up with new technologies in projects
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <ul class="mb-resp-15">
                                                        <li>Full Responsive Design</li>
                                                        <li>Modern Browser Compatible</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <ul>
                                                        <li>Clean & Quality Code</li>
                                                        <li>7/24 Customer Support</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endisset
                                    @if (is_countable($why_chooses_style1) && count($why_chooses_style1) > 0)
                                        <div class="row">
                                            @foreach ($why_chooses_style1 as $item)
                                                <div class="col-md-6 col-sm-6 skills-item-resp">
                                                    @if(Auth::user())
                                                        @can('section check')
                                                            @php
                                                                $url = request()->path();
                                                                $modified_url = str_replace('/', '-bracket-', $url);
                                                            @endphp
                                                            <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                                @csrf
                                                                <input type="hidden" name="route" value="why-choose.edit">
                                                                <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                                <button type="submit" class="me-2 custom-pure-button ">
                                                                    <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    @endif
                                                    <div class="skills-item">
                                                        <div class="skills-item-text">
                                                            <h5>@php echo html_entity_decode($item->title); @endphp</h5>
                                                        </div>
                                                        <div class="body">
                                                            <h2 class="counter">{{ $item->timer }}</h2>
                                                            <div class="skills-progress-bar">
                                                                <div class="skills-progress-value slideInLeft wow" data-percent="{{ $item->timer }}"></div>
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
                                                <div class="col-md-6 col-sm-6 skills-item-resp">
                                                    <div class="skills-item">
                                                        <div class="skills-item-text">
                                                            <h5>Design</h5>
                                                        </div>
                                                        <div class="body">
                                                            <h2 class="counter">80</h2>
                                                            <div class="skills-progress-bar">
                                                                <div class="skills-progress-value slideInLeft wow" data-percent="80"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 skills-item-resp">
                                                    <div class="skills-item">
                                                        <div class="skills-item-text">
                                                            <h5>Coding</h5>
                                                        </div>
                                                        <div class="body">
                                                            <h2 class="counter">90</h2>
                                                            <div class="skills-progress-bar">
                                                                <div class="skills-progress-value slideInLeft wow" data-percent="90"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--// Skills Section End //-->

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
                    <input type="hidden" name="route" value="why-choose.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="why-choose.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_why_choose') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
