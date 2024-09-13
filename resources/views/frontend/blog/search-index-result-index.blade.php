@if(Auth::user())
    @can('blog check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @if (is_countable($blogs_paginate_style) && count($blogs_paginate_style) > 0)
                    <!--// Blog Section Start //-->
                    <section class="section" id="blog">
                        <div class="container">
                            @if(Auth::user())
                                @can('blog check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row">
                                @foreach ($blogs_paginate_style as $item)
                                    <div class="col-lg-4 col-md-6">
                                        @if(Auth::user())
                                            @can('blog check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="blog.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button ">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="blog-item">
                                            @if (!empty($item->section_image))
                                                <div class="blog-img">
                                                    <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">
                                                        <img src="{{ asset('uploads/img/blog/thumbnail/'.$item->section_image) }}" alt="Blog image" class="img-fluid">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="blog-img">
                                                    <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">
                                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid">
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#">
                                                        <span><i class="far fa-user"></i>@if ($item->type == "with_this_account") {{ $item->author_name }} @else {{ __('frontend.anonymous') }} @endif</span>
                                                    </a>
                                                    <a href="#">
                                                        <span><i class="far fa-bookmark"></i>{{ $item->category_name }}</span>
                                                    </a>
                                                </div>
                                                <h5>
                                                    <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                                </h5>
                                                @if (!empty($item->short_description)) <p>{{ $item->short_description }}</p> @endif
                                                <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}" class="blog-link">
                                                    {{ __('frontend.read_more') }}
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="row mt-5">
                                <div class="col-xl-12">
                                    <div class="easier-pagination-container">
                                        {{ $blogs_paginate_style->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Blog Section End //-->
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <!--// Blog Sidebar Section Start //-->
                    <section class="section padding-minus-90" id="blog-sidebar-page">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget-sidebar">
                                        <div class="sidebar-widgets">
                                            <h5 class="inner-header-title">{{ __('frontend.search') }}</h5>
                                            <form action="{{ route('default-blog-search-index') }}" method="POST">
                                                @csrf
                                                <div class="blog-search-bar position-relative">
                                                    <input type="search" name="search" placeholder="{{ __('frontend.type_to_search') }}" class="search-form-control" required>
                                                    <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--// Blog Grid Sidebar End //-->
                    @endif
                @endif

                @if(Auth::user())
                    @can('blog check')
            </div>
            <div class="easier-middle">
                @php
                    $modified_url = '/'
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="blog.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
