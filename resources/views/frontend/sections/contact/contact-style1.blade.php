@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Contact Section Start //-->
                <section class="section bg-primary-light" id="contact" data-scroll-index="7">
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
                        @isset ($contact_info_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>@php echo html_entity_decode($contact_info_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($contact_info_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>Contact Me</span>
                                            <h2>Contact Us</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset

                        @if (is_countable($contact_infos_style1) && count($contact_infos_style1) > 0)
                            <div class="row">
                                @foreach ($contact_infos_style1 as $item)
                                    <div class="col-lg-6">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="contact-info.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="contact-info-item">
                                            @if ($item->type == "image")
                                                @if (!empty($item->section_image))
                                                    <div class="icon">
                                                        <img src="{{ asset('uploads/img/contact_info/'.$item->section_image) }}" alt="feature image">
                                                    </div>
                                                @endif
                                            @else
                                                <div class="icon">
                                                    <span class="{{ $item->icon }}"></span>
                                                </div>
                                            @endif
                                            <div class="body">
                                                <h5>@php echo html_entity_decode($item->title); @endphp</h5>
                                                <p>@php echo html_entity_decode($item->description); @endphp</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-info-item">
                                            <div class="icon">
                                                <span class="fa fa-map-marker-alt"></span>
                                            </div>
                                            <div class="body">
                                                <h5>Address</h5>
                                                <p>1395 Nixon Avenue Etowah, TN 37331
                                                    <br>
                                                    United States
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-info-item">
                                            <div class="icon">
                                                <span class="fas fa-envelope-open-text"></span>
                                            </div>
                                            <div class="body">
                                                <h5>E-Mail Phone:</h5>
                                                <p>elsecolor@gmail.com</p>
                                                <p>+1 422-200-5555</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                @include('frontend.sections.contact.style1-contact')
                            </div>
                        </div>
                    </div>
                </section>
                <!--// Contact Section End //-->

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
                    <input type="hidden" name="route" value="contact-info.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="contact-info.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_contact_info') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif

