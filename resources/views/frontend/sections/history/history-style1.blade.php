@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// My History Start //-->
                <section class="section" id="my-history">
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
                        @isset ($history_section_style1)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>@php echo html_entity_decode($history_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($history_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="section-heading-left">
                                            <span>History</span>
                                            <h2>Our History</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset
                        @if (is_countable($histories_style1) && count($histories_style1) > 0)
                            <div class="history-wrapper">
                                @foreach ($histories_style1 as $item)
                                    <div class="history-item">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="history.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="history-item-inner">
                                            @if (!empty($item->section_image))
                                                <div class="history-img">
                                                    <img src="{{ asset('uploads/img/history/'.$item->section_image) }}" alt="history image" class="img-fluid">
                                                </div>
                                            @endif
                                            <div class="history-text">
                                                <h2>@php echo html_entity_decode($item->title); @endphp</h2>
                                                <p>@php echo html_entity_decode($item->description); @endphp</p>
                                            </div>
                                        </div>
                                        @if (!empty($item->history_date))
                                            <div class="history-date-wrap">
                                <span class="history-date">
                                    {{ $item->history_date }}
                                </span>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="history-wrapper">
                                    <div class="history-item">
                                        <div class="history-item-inner">
                                            <div class="history-img">
                                                <img src="{{ asset('uploads/img/dummy/450x300.jpg') }}" alt="history image" class="img-fluid">
                                            </div>
                                            <div class="history-text">
                                                <h2>We started the industrial sector and started working in many sectors.</h2>
                                                <p>
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique iusto tempore, ipsam ad, quos repudiandae quisquam nemo quas maxime quam adipisci temporibus consequatur pariatur eaque voluptatum hic officiis ea libero?
                                                </p>
                                            </div>
                                        </div>
                                        <div class="history-date-wrap">
                                <span class="history-date">
                                    2010
                                </span>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <div class="history-item-inner">
                                            <div class="history-img">
                                                <img src="{{ asset('uploads/img/dummy/450x300.jpg') }}" alt="history image" class="img-fluid">
                                            </div>
                                            <div class="history-text">
                                                <h2>We expanded our team members and organized conferences and seminars.</h2>
                                                <p>
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique iusto tempore, ipsam ad, quos repudiandae quisquam nemo quas maxime quam adipisci temporibus consequatur pariatur eaque voluptatum hic officiis ea libero?
                                                </p>
                                            </div>
                                        </div>
                                        <div class="history-date-wrap">
                                <span class="history-date">
                                    2015
                                </span>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <div class="history-item-inner">
                                            <div class="history-img">
                                                <img src="{{ asset('uploads/img/dummy/450x300.jpg') }}" alt="history image" class="img-fluid">
                                            </div>
                                            <div class="history-text">
                                                <h2>We have the latest UI and UX designs by following all trends.</h2>
                                                <p>
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique iusto tempore, ipsam ad, quos repudiandae quisquam nemo quas maxime quam adipisci temporibus consequatur pariatur eaque voluptatum hic officiis ea libero?
                                                </p>
                                            </div>
                                        </div>
                                        <div class="history-date-wrap">
                                <span class="history-date">
                                    2024
                                </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
                <!--// My History End //-->


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
                    <input type="hidden" name="route" value="history.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="history.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_history') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
