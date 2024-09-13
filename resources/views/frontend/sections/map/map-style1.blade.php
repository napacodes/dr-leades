@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($map_section_style1)
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
                    <!--//Google Map Section Start //-->
                    <div class="google-map">
                        <iframe src="{{ $map_section_style1->map_iframe }}" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!--// Google Map Section End //-->
                @else
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
                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                        <!--//Google Map Section Start //-->
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3209.9276396281293!2d-82.32472778472037!3d36.43513238002549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885a86bd9ebc8df3%3A0xa66b715302e6215a!2s381%20Allison%20Rd%2C%20Piney%20Flats%2C%20TN%2037686%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1607771147842!5m2!1str!2str" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!--// Google Map Section End //-->
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
                    <input type="hidden" name="route" value="map.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.edit_map') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
