@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($video_section_style1)
                    <!--// Borg Video Section Start //-->
                    <section class="section" id="borgsection" @if (!empty($video_section_style1->section_image)) data-bg-image-path="{{ asset('uploads/img/video/'.$video_section_style1->section_image) }}" @endif>
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
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="borgsection-inner">
                                        <h3>@php echo html_entity_decode($video_section_style1->title); @endphp</h3>
                                        @if (!empty($video_section_style1->video_url))
                                            <div class="borg-video-wrap">
                                                @if ($video_section_style1->video_type == 'youtube')
                                                    <a class="borgsection-video-btn" href="{{ $video_section_style1->video_url }}0"><i class="fa fa-play"></i></a>
                                                @else
                                                    <a class="borgsection-video-btn-2" href="{{ $video_section_style1->video_url }}0"><i class="fa fa-play"></i></a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Borg Video Section End //-->
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <!--// Borg Video Section Start //-->
                    <section class="section" id="borgsection" data-bg-image-path="{{ asset('uploads/img/dummy/1920x640.jpg') }}">
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
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="borgsection-inner">
                                        <h3>Stay informed about us by watching our sponsor video</h3>
                                        <div class="borg-video-wrap">
                                            <a class="borgsection-video-btn" href="https://www.youtube.com/watch?v=YqQx75OPRa0"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Borg Video Section End //-->
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
                    <input type="hidden" name="route" value="video.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_video') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
