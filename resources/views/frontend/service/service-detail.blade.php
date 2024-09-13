<!--// Services Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">

                @if(Auth::user())
                    @can('service check')
                        <div class="easier-mode">
                            @if(Auth::user())
                                @can('service check')
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

                                @isset ($service_content)
                                    <div class="services-detail-top">
                                        @if (!empty($service_content->section_image))
                                            <img src="{{ asset('uploads/img/service/'.$service_content->section_image) }}" alt="Services image" class="img-fluid">
                                            @if ($service->type == 'image')
                                                @if (!empty($service->section_image))
                                                    <span>
                                                      <img src="{{ asset('uploads/img/service/'.$service->section_image) }}" alt="Services image" class="img-fluid">
                                                    </span>
                                                @endif
                                            @else
                                                <span class="{{ $service->icon }}"></span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="services-detail-inner">
                                        <p>@php echo html_entity_decode($service_content->description); @endphp</p>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
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
                                    @endif
                                @endisset

                                @if(Auth::user())
                                    @can('service check')
                            </div>
                            <div class="easier-middle">
                                @php
                                    $url = request()->path();
                                    $modified_url = str_replace('/', '-bracket-', $url);
                                @endphp
                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="route" value="service-content.create">
                                    <input type="hidden" name="style" value="{{ $service->id }}">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white me-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_service_content') }}
                                    </button>
                                </form>

                            </div>

                        </div>
                    @endcan
                @endif

                @if(Auth::user())
                    @can('service check')
                        <div class="easier-mode">
                            @if(Auth::user())
                                @can('service check')
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

                                @isset ($service_info)
                                    <div class="web-design-process">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="design-process-video">
                                                    @if (!empty($service_info->section_image))
                                                        <img src="{{ asset('uploads/img/service/'.$service_info->section_image) }}" alt="service info" class="img-fluid">
                                                    @endif
                                                    @if (!empty($service_info->video_url))
                                                        @if ($service_info->video_type == 'youtube')
                                                            <a class="design-process-video-btn" href="{{ $service_info->video_url }}"><i class="fa fa-play"></i></a>
                                                        @else
                                                            <a class="design-process-video-btn-2" href="{{ $service_info->video_url }}"><i class="fa fa-play"></i></a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="design-process-inner">
                                                    <h5>{{ $service_info->title }}</h5>
                                                    @if (!empty($service_info->item))
                                                        @php
                                                            $str = $service_info->item;
                                                            $array_items = explode(",",$str);
                                                        @endphp
                                                        <ul>
                                                            @foreach ($array_items as $item)
                                                                <li>
                                                                    <i class="fa fa-check"></i>
                                                                    <span>{{ $item }}</span>
                                                                </li>
                                                            @endforeach
                                                            @unset ($item)
                                                        </ul>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="web-design-process">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="design-process-video">
                                                        <img src="{{ asset('uploads/img/dummy/800x600.jpg') }}" alt="" class="img-fluid">
                                                        <a class="design-process-video-btn" href="https://www.youtube.com/watch?v=YqQx75OPRa0"><i class="fa fa-play"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="design-process-inner">
                                                        <h5>The steps we followed in the Web Design process</h5>
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-check"></i>
                                                                <span>We plan the design first</span>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>
                                                                <span>Drawing the project sketch</span>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>
                                                                <span>Converting to psd with wireframe</span>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>
                                                                <span>Converting psd design to html</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endisset

                                @if(Auth::user())
                                    @can('service check')
                            </div>
                            <div class="easier-middle">
                                @php
                                    $url = request()->path();
                                    $modified_url = str_replace('/', '-bracket-', $url);
                                @endphp
                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="route" value="service-info.create">
                                    <input type="hidden" name="style" value="{{ $service->id }}">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white me-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_service_info') }}
                                    </button>
                                </form>

                            </div>

                        </div>
                    @endcan
                @endif

            </div>
            <div class="col-lg-4 col-md-12">
                <div class="widget-sidebar">

                    @if(Auth::user())
                        @can('service check')
                            <div class="easier-mode">
                                @if(Auth::user())
                                    @can('service check')
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

                                    <div class="sidebar-widgets mb-3">
                                        @isset ($service_feature_section)
                                            <h5 class="inner-header-title">{{ $service_feature_section->title }}</h5>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                <h5 class="inner-header-title">Service Details</h5>
                                            @endif
                                        @endisset
                                        @if (is_countable($service_features) && count($service_features) > 0)
                                            <div class="sidebar-details-list">
                                                <ul>
                                                    @foreach ($service_features as $item)
                                                        <li>
                                                            @if(Auth::user())
                                                                @can('service check')
                                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                                        @csrf
                                                                        <input type="hidden" name="route" value="service-feature.edit">
                                                                        <input type="hidden" name="style" value="">
                                                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            @endif
                                                            <h6>{{ $item->title }}<span>{{ $item->description }}</span></h6>
                                                        </li>
                                                    @endforeach
                                                    @unset ($item)
                                                </ul>
                                            </div>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                <div class="sidebar-details-list">
                                                    <ul>
                                                        <li><h6>Service Name<span>Web Design</span></h6></li>
                                                        <li><h6>Service Industry<span>Web,App</span></h6></li>
                                                        <li><h6>Service Duration<span>2 Weeks</span></h6></li>
                                                        <li><h6>Service Total Hours<span>336 Hour</span></h6></li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    @if(Auth::user())
                                        @can('service check')
                                </div>
                                <div class="easier-middle">
                                    @php
                                        $url = request()->path();
                                        $modified_url = str_replace('/', '-bracket-', $url);
                                    @endphp
                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="route" value="service-feature.create">
                                        <input type="hidden" name="style" value="{{ $service->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="route" value="service-feature.create">
                                        <input type="hidden" name="style" value="{{ $service->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_service_feature') }}
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endcan
                    @endif

                    @if (is_countable($recent_services) && count($recent_services) > 0)
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.recent_services') }}</h5>
                            @foreach ($recent_services as $item)
                                <div class="recent-post-item clearfix">
                                    <div class="recent-post-img mr-3">
                                        @if (!empty($item->button_name))
                                            <a href="{{ $item->button_url }}">
                                                @if (!empty($item->section_image_2))
                                                    <img src="{{ asset('uploads/img/service/'.$item->section_image_2) }}" class="img-fluid image-size-100" alt="service image">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="service image">
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('default-service-detail-show', ['service_slug' => $item->service_slug]) }}">
                                                @if (!empty($item->section_image_2))
                                                    <img src="{{ asset('uploads/img/service/'.$item->section_image_2) }}" class="img-fluid image-size-100" alt="service image">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="service image">
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                    <div class="recent-post-body">
                                        @if (!empty($service_detail_show->page_uri))
                                            <a href="{{ url($service_detail_show->page_uri.'/'.$item->service_slug) }}">
                                                <h6 class="recent-post-title">{{ $item->title }}</h6>
                                            </a>
                                        @else
                                            <a href="{{ route('default-service-detail-show', ['service_slug' => $item->service_slug]) }}">
                                                <h6 class="recent-post-title">{{ $item->title }}</h6>
                                            </a>
                                        @endif
                                        <p class="recent-post-date"><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($item->created_at)->isoFormat('GGGG') }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @unset ($item)
                        </div>
                    @endif

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">{{ __('frontend.copy_link_and_share') }}</h5>
                        <ul class="sidebar-share clearfix">
                            <li>
                                <div style="display: none;" id="hiddenURLDiv"></div>
                                <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link fa-facebook-f"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--// Services Section End //-->
