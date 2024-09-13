@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// How I Work Section Start //-->
                <section class="section bg-dark-blue pb-30">
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
                        @isset ($work_process_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>@php echo html_entity_decode($work_process_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($work_process_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>How Our Work</span>
                                        <h2>Our prepare your projects in 3 stages</h2>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endisset
                            @if (is_countable($work_processes_style1) && count($work_processes_style1) > 0)
                            <div class="row">
                                @php $i = 2; $t = 1; @endphp
                                @foreach ($work_processes_style1->chunk(3) as $work_process)
                                    <div class="row">
                                        @foreach ($work_process as $item)
                                            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.{{ $i + 2 }}s">
                                                <div class="how-i-work-item">
                                                    @if (!$loop->last)
                                                        <img src="{{ asset('uploads/img/dummy/bg/arrow-img.png') }}" alt="Arrrow image" class="arrow-dashed-img">
                                                    @endif

                                                    <div class="number">
                                                        <span>0{{ $t++ }}</span>
                                                    </div>
                                                    <div class="number-border"></div>
                                                    @if (!empty($item->section_image))
                                                        <div class="img">
                                                            <img src="{{ asset('uploads/img/work_process/'.$item->section_image) }}" class="img-fluid" alt="How i work">
                                                        </div>
                                                    @endif
                                                    <div class="text">
                                                        @if(Auth::user())
                                                            @can('section check')
                                                                @php
                                                                    $url = request()->path();
                                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                                @endphp
                                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                                    @csrf
                                                                    <input type="hidden" name="route" value="work-process.edit">
                                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        @endif
                                                        <h5>@php echo html_entity_decode($item->title); @endphp</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @unset ($item)
                                    </div>
                                @endforeach
                                @unset ($work_process)
                            </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s">
                                        <div class="how-i-work-item">
                                            <img src="{{ asset('uploads/img/dummy/bg/arrow-img.png') }}" alt="Arrrow image" class="arrow-dashed-img">
                                            <div class="number">
                                                <span>01</span>
                                            </div>
                                            <div class="number-border"></div>
                                            <div class="img">
                                                <img src="{{ asset('uploads/img/dummy/328x328.jpg') }}" class="img-fluid" alt="How i work">
                                            </div>
                                            <div class="text">
                                                <h5>Thinking</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s">
                                        <div class="how-i-work-item">
                                            <img src="{{ asset('uploads/img/dummy/bg/arrow-img.png') }}" alt="Arrrow image" class="arrow-dashed-img">
                                            <div class="number">
                                                <span>02</span>
                                            </div>
                                            <div class="number-border"></div>
                                            <div class="img">
                                                <img src="{{ asset('uploads/img/dummy/328x328.jpg') }}" class="img-fluid" alt="How i work">
                                            </div>
                                            <div class="text">
                                                <h5>Research</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.6s">
                                        <div class="how-i-work-item">
                                            <div class="number">
                                                <span>03</span>
                                            </div>
                                            <div class="number-border"></div>
                                            <div class="img">
                                                <img src="{{ asset('uploads/img/dummy/328x328.jpg') }}" class="img-fluid" alt="How i work">
                                            </div>
                                            <div class="text">
                                                <h5>Design</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                    </div>
                </section>
                <!--// How I Work Section End //-->

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
                    <input type="hidden" name="route" value="work-process.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="work-process.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_work_process') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
