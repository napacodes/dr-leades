@if(Auth::user())
        <div class="easier-mode">
            <div class="easier-section-area">
                @endif

                <!--// Footer Start //-->
                <footer class="footer">
                    <div class="footer-top">
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
                                <div class="col-md-6 col-lg-4 footer-widget-resp">
                                    <div class="footer-widget">
                                        <h6 class="footer-title">{{ __('frontend.about_us') }}</h6>
                                        @isset ($footer_image_style1)
                                            @if (!empty($footer_image_style1->section_image))
                                                <a href="{{ url('/') }}">
                                                    <img src="{{ asset('uploads/img/general/'.$footer_image_style1->section_image) }}" alt="footer logo" class="img-fluid footer-logo">
                                                </a>
                                            @endif
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/your-logo.jpg') }}" alt="footer logo" class="img-fluid footer-logo">
                                                </a>
                                            @endif
                                        @endisset
                                        @isset($site_info)
                                            <p class="footer-desc">{{ $site_info->description }}</p>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <p class="footer-desc">
                                                It is a long established fact that a reader will be
                                                distracted by the readable content..
                                            </p>
                                            @endif
                                        @endisset

                                        @if (is_countable($socials) && count($socials) > 0)
                                            <div class="footer-social-links">
                                                @foreach ($socials as $social)
                                                    @if ($social->social_media == 'fab fa-twitter')
                                                       <a class="border border-0" href="{{ $social->url }}"><img src="{{ asset('uploads/img/dummy/x-twitter-white.svg') }}" alt="x icon"></a>
                                                    @else
                                                        <a href="{{ $social->url }}"><i class="{{ $social->social_media }}"></i></a>
                                                    @endif
                                                @endforeach
                                                @unset ($social)
                                            </div>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <div class="footer-social-links">
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if (is_countable($footer_categories) && count($footer_categories) > 0)
                                    @foreach ($footer_categories as $footer_category)
                                <div class="col-md-6 col-lg-4 footer-widget-resp">
                                    <div class="footer-widget footer-widget-pl">
                                        <h6 class="footer-title">{{ $footer_category->category_name }}</h6>
                                        <ul class="footer-links">
                                            @foreach ($footers as $footer)
                                                @if ($footer_category->category_name == $footer->category_name)
                                                    <li><a href="{{ $footer->url }}">{{ $footer->title }}</a></li>
                                                @endif
                                            @endforeach
                                            @unset ($footer)
                                        </ul>
                                    </div>
                                </div>
                                    @endforeach
                                    @unset ($footer_category)
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget footer-widget-pl">
                                            <h6 class="footer-title">Usefull Links</h6>
                                            <ul class="footer-links">
                                                <li>
                                                    <a href="javascript:void(0)">My Team</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">My Services</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">My Resume</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">My Works</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Get in Touch</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Privacy Policy</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @isset ($contact_info_widget_style1)
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h6 class="footer-title">{{ $contact_info_widget_style1->title }}</h6>
                                            <div class="footer-contact-info-wrap">
                                                <ul class="footer-contact-info-list">
                                                    @if (!empty($contact_info_widget_style1->address))
                                                    <li>
                                                        <p>{{ $contact_info_widget_style1->description }}</p>
                                                    </li>
                                                    @endif
                                                    @if (!empty($contact_info_widget_style1->address))
                                                        <li>
                                                            <h6><i class="far fa-map custom-color-orange"></i> {{ __('frontend.address') }}</h6>
                                                            <p>@php echo html_entity_decode($contact_info_widget_style1->address); @endphp</p>
                                                        </li>
                                                    @endif
                                                        @if (!empty($contact_info_widget_style1->email))
                                                            <li>
                                                                <h6><i class="far fa-envelope custom-color-orange"></i> {{ __('frontend.email') }}</h6>
                                                                <div class="text">
                                                                    <p><a class="text-white" href="mailto:{{ $contact_info_widget_style1->email }}">{{ $contact_info_widget_style1->email }}</a></p>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @if (!empty($contact_info_widget_style1->phone))
                                                            <li>
                                                                <h6><i class="fas fa-phone custom-color-orange"></i> {{ __('frontend.phone') }}</h6>
                                                                <div class="text">
                                                                    <p><a class="text-white" href="tel:{{ $contact_info_widget_style1->phone }}">{{ $contact_info_widget_style1->phone }}</a></p>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @if (!empty($contact_info_widget_style1->working_hour))
                                                            <li>
                                                                <h6><i class="fas fa-clock custom-color-orange"></i> {{ __('frontend.working_hour') }}</h6>
                                                                <div class="text">
                                                                    <p>{{ $contact_info_widget_style1->working_hour }}</p>
                                                                </div>
                                                            </li>
                                                        @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                    <div class="footer-widget">
                                        <h6 class="footer-title">Contact Info</h6>
                                        <div class="footer-contact-info-wrap">
                                            <ul class="footer-contact-info-list">
                                                <li>
                                                    <h6>Address:</h6>
                                                    <p>
                                                        1395 Nixon Avenue Etowah, TN 37331
                                                        <br>United States
                                                    </p>
                                                </li>
                                                <li>
                                                    <h6>E-Mail & Phone:</h6>
                                                    <div class="text">
                                                        <p>+1 422-200-5555</p>
                                                        <p>elsecolor@gmail.com</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    @isset ($site_info)
                        @if (!empty($site_info->copyright))
                            <div class="copyright">
                                <div class="container">
                                    <p class="copyright-text">@php echo html_entity_decode($site_info->copyright); @endphp</p>
                                </div>
                            </div>
                        @endif
                    @else
                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                        <div class="copyright">
                            <div class="container">
                                <p class="copyright-text">© Copyright 2024. Powered By ElseColor</p>
                            </div>
                        </div>
                        @endif
                    @endisset
                </footer>
                <!--// Footer End //-->

                @if(Auth::user())
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                @can('setting check')
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="footer-image.create">
                        <input type="hidden" name="style" value="style1">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_footer_image') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="site-info.create">
                        <input type="hidden" name="style" value="">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_site_info') }}
                        </button>
                    </form>
                @endcan
                @can('section check')
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="footer.create">
                        <input type="hidden" name="style" value="">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                            <i class="fa fa-plus text-white"></i> {{ __('content.add_footer') }}
                        </button>
                    </form>
                @endcan
                @can('setting check')
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="contact-info-widget.create">
                        <input type="hidden" name="style" value="style1">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                            <i class="fa fa-plus text-white"></i> {{ __('content.add_contact_info') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="social.create">
                        <input type="hidden" name="style" value="">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-plus text-white"></i> {{ __('content.add_social') }}
                        </button>
                    </form>
                @endcan
            </div>
        </div>
@endif
