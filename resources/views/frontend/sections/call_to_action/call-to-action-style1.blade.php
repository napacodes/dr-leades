@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($cta_section_style1)
                    <section id="cta">
                        <div class="call-to-action mt-0">
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
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="call-to-action-inner">
                                            <h2>@php echo html_entity_decode($cta_section_style1->title); @endphp</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="call-to-action-btn">
                                            @if (!empty($cta_section_style1->button_name))
                                                <a href="{{ $cta_section_style1->button_url }}" class="white-btn">
                                                    <span class="text">{{ $cta_section_style1->button_name }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section id="cta">
                        <div class="call-to-action mt-0">
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
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="call-to-action-inner">
                                            <h2>Dou you need a new project ?</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="call-to-action-btn">
                                            <a href="#" data-scroll-nav="7"  class="white-btn">
                                                <span class="text">Contact Me</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                @endisset

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
                    <input type="hidden" name="route" value="call-to-action.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_call_to_action') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
