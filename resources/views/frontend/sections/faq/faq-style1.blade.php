@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Frequently Asked Questions Section Start //-->
                <section class="section" id="faqsection">
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
                        @isset($faq_section_style1)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>@php echo html_entity_decode($faq_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($faq_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>FAQ</span>
                                            <h2>Frequently Asked <br> Questions</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset
                        @if (is_countable($faqs_style1) && count($faqs_style1) > 0)
                            @php
                                $the_number_of_faqs = count($faqs_style1);
                                if ($the_number_of_faqs %2 == 0) {
                                    $half_of_faqs = $the_number_of_faqs / 2 + 1;
                                }
                                else {
                                    $half_of_faqs = (integer)($the_number_of_faqs / 2) + 2;
                                }
                            @endphp
                            <div class="row">
                                <div class="col-lg-6">
                                    @foreach ($faqs_style1 as $faq_style1)
                                        @if ($loop->iteration < $half_of_faqs)
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="faq.edit">
                                                        <input type="hidden" name="single_id" value="{{ $faq_style1->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="accordion-item">
                                                <div class="accordion-item-header" id="accordionHeadingOne{{ $loop->iteration }}">
                                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemOne{{ $loop->iteration }}" aria-expanded="false" aria-controls="accordionItemOne{{ $loop->iteration }}" class="collapsed">
                                                        <i class="fas fa-question"></i>
                                                        <span>{{ $faq_style1->question }}</span>
                                                    </a>
                                                </div>
                                                <div id="accordionItemOne{{ $loop->iteration }}" class="collapse" aria-labelledby="accordionHeadingOne{{ $loop->iteration }}" style="">
                                                    <div class="accordion-body">
                                                        <p>@php echo html_entity_decode($faq_style1->answer); @endphp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                    @unset ($faq_style1)
                                </div>
                                <div class="col-lg-6 accordion-resp-mt">
                                    @foreach ($faqs_style1 as $faq_style1)
                                        @if ($loop->iteration >= $half_of_faqs)
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="faq.edit">
                                                        <input type="hidden" name="single_id" value="{{ $faq_style1->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="accordion-item">
                                                <div class="accordion-item-header" id="accordionHeadingTwo{{ $loop->iteration }}">
                                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemTwo{{ $loop->iteration }}" aria-expanded="false" aria-controls="accordionItemTwo{{ $loop->iteration }}" class="collapsed">
                                                        <i class="fas fa-question"></i>
                                                        <span>{{ $faq_style1->question }}</span>
                                                    </a>
                                                </div>
                                                <div id="accordionItemTwo{{ $loop->iteration }}" class="collapse" aria-labelledby="accordionHeadingTwo{{ $loop->iteration }}" style="">
                                                    <div class="accordion-body">
                                                        <p>@php echo html_entity_decode($faq_style1->answer); @endphp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @unset ($faq_style1)
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="accordion-item">
                                            <div class="accordion-item-header" id="accordionHeadingOne">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemOne" aria-expanded="false" aria-controls="accordionItemOne" class="collapsed">
                                                    <i class="fas fa-question"></i>
                                                    <span>How Are The Packages Updated ?</span>
                                                </a>
                                            </div>
                                            <div id="accordionItemOne" class="collapse" aria-labelledby="accordionHeadingOne" style="">
                                                <div class="accordion-body">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                                        as opposed to using 'Content here, content here', making it look like readable
                                                        English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-item-header" id="accordionHeaderTwo">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemTwo" aria-expanded="false" aria-controls="accordionItemTwo">
                                                    <i class="fas fa-question"></i>
                                                    <span>How to install this program?</span>
                                                </a>
                                            </div>
                                            <div id="accordionItemTwo" class="collapse" aria-labelledby="accordionHeaderTwo">
                                                <div class="accordion-body">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                                        as opposed to using 'Content here, content here', making it look like readable
                                                        English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-item-header" id="accordionHeaderThree">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemThree" aria-expanded="false" aria-controls="accordionItemThree">
                                                    <i class="fas fa-question"></i>
                                                    <span>How do I edit the dashboard panel?</span>
                                                </a>
                                            </div>
                                            <div id="accordionItemThree" class="collapse" aria-labelledby="accordionHeaderThree">
                                                <div class="accordion-body">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                                        as opposed to using 'Content here, content here', making it look like readable
                                                        English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 accordion-resp-mt">
                                        <div class="accordion-item">
                                            <div class="accordion-item-header" id="accordionHeadingFour">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemFour" aria-expanded="false" aria-controls="accordionItemFour" class="collapsed">
                                                    <i class="fas fa-question"></i>
                                                    <span>How do i get new updates for free?</span>
                                                </a>
                                            </div>
                                            <div id="accordionItemFour" class="collapse" aria-labelledby="accordionHeadingFour" style="">
                                                <div class="accordion-body">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                                        as opposed to using 'Content here, content here', making it look like readable
                                                        English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-item-header" id="accordionHeaderFive">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemFive" aria-expanded="false" aria-controls="accordionItemFive">
                                                    <i class="fas fa-question"></i>
                                                    <span>How can I upload a screenshot?</span>
                                                </a>
                                            </div>
                                            <div id="accordionItemFive" class="collapse" aria-labelledby="accordionHeaderFive">
                                                <div class="accordion-body">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                                        as opposed to using 'Content here, content here', making it look like readable
                                                        English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-item-header" id="accordionHeaderSix">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemSix" aria-expanded="false" aria-controls="accordionItemSix">
                                                    <i class="fas fa-question"></i>
                                                    <span>How do I activate multiple users?</span>
                                                </a>
                                            </div>
                                            <div id="accordionItemSix" class="collapse" aria-labelledby="accordionHeaderSix">
                                                <div class="accordion-body">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                                        as opposed to using 'Content here, content here', making it look like readable
                                                        English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
                <!--// Frequently Asked Questions Section End //-->

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
                    <input type="hidden" name="route" value="faq.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="faq.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_faq') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
