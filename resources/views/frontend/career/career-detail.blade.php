<!--// Career Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mx-auto">

                @if(Auth::user())
                    @can('career check')
                        <div class="easier-mode">
                            @if(Auth::user())
                                @can('career check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="easier-section-area">
                                @endcan
                                @endif

                                @isset ($career_content)
                                    <div class="services-detail-top">
                                        @if (!empty($career_content->section_image))
                                            <img src="{{ asset('uploads/img/career/'.$career_content->section_image) }}" alt="Services image" class="img-fluid">
                                        @endif
                                        @if ($career->type == 'image')
                                            @if (!empty($career->section_image))
                                                <span>
                                                      <img src="{{ asset('uploads/img/career/'.$career->section_image) }}" alt="career image" class="img-fluid">
                                                    </span>
                                            @endif
                                        @else
                                            <span class="{{ $career->icon }}"></span>
                                        @endif
                                    </div>
                                    <div class="services-detail-inner">
                                        <p>@php echo html_entity_decode($career_content->description); @endphp</p>
                                    </div>
                                @else
                                    <div class="services-detail-top">
                                        <img src="{{ asset('uploads/img/dummy/800x600.jpg') }}" alt="Services image" class="img-fluid">
                                        <span class="fa fa-tablet"></span>
                                    </div>
                                    <div class="services-detail-inner">
                                        <h2>We accelerated our web design and development process</h2>

                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        </p>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form, by injected humour, or randomised words which
                                            don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
                                            you need to be sure there isn't anything embarrassing
                                        </p>
                                    </div>
                                @endisset

                                @if(Auth::user())
                                    @can('career check')
                            </div>
                            <div class="easier-middle">
                                @php
                                    $url = request()->path();
                                    $modified_url = str_replace('/', '-bracket-', $url);
                                @endphp
                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="route" value="career-content.create">
                                    <input type="hidden" name="style" value="{{ $career->id }}">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white me-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_career_content') }}
                                    </button>
                                </form>

                            </div>


                        </div>
                    @endcan
                @endif


            </div>
        </div>
    </div>
</section>
<!--// Career Section End //-->

@if(Auth::user())
    @can('career check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Contact Section Start //-->
                <section class="section bg-primary-light" id="contact">
                    <div class="container">

                        @if(Auth::user())
                            @can('career check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif

                        @isset ($career_section_style1)
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-info-item">
                                            <div class="icon border-0">
                                                <span class="fa fa-building"></span>
                                            </div>
                                            <div class="body">
                                                <h5>@php echo html_entity_decode($career_section_style1->company_title); @endphp</h5>
                                                <p>@php echo html_entity_decode($career_section_style1->company_description); @endphp</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-info-item">
                                            <div class="icon border-0">
                                                <span class="fas fa-envelope-open-text"></span>
                                            </div>
                                            <div class="body">
                                                <h5>{{ $career_section_style1->company_contact_title }}</h5>
                                                <p>
                                                    <a class="custom-color-light-black" href="mailto:{{ $career_section_style1->email }}">{{ $career_section_style1->email }}</a>
                                                </p>
                                                <p>
                                                    <a class="custom-color-light-black" href="tel:{{ $career_section_style1->phone }}">{{ $career_section_style1->phone }}</a>
                                                </p>
                                                <p>{{ $career_section_style1->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-info-item">
                                                <div class="icon border-0">
                                                    <span class="fa fa-building"></span>
                                                </div>
                                                <div class="body">
                                                    <h5>About Company</h5>
                                                    <p>
                                                        We have been serving you since 2000. We are here for the best version of digital. Contact us now to build a career with us.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-info-item">
                                                <div class="icon border-0">
                                                    <span class="fas fa-envelope-open-text"></span>
                                                </div>
                                                <div class="body">
                                                    <h5>E-Mail Phone:</h5>
                                                    <p>
                                                        <a class="custom-color-light-black" href="mailto:elsecolor@gmail.com">elsecolor@gmail.com</a>
                                                    </p>
                                                    <p>
                                                        <a class="custom-color-light-black" href="tel:+1 422-200-5555">+1 422-200-5555</a>
                                                    </p>
                                                    <p>1395 Nixon Avenue Etowah, TN 37331</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset

                    </div>
                </section>
                <!--// Contact Section End //-->

                @if(Auth::user())
                    @can('career check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="career.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif

