@if(Auth::user())
    @can('blog check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

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
                        @if (is_countable($blogs_paginate_style) && count($blogs_paginate_style) > 0)
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
                                                @if (!empty($blog_detail_show->page_uri))
                                                    <div class="blog-img">
                                                        <a href="{{ url($blog_detail_show->page_uri.'/'.$item->slug) }}">
                                                            <img src="{{ asset('uploads/img/blog/thumbnail/'.$item->section_image) }}" alt="Blog image" class="img-fluid">
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="blog-img">
                                                        <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">
                                                            <img src="{{ asset('uploads/img/blog/thumbnail/'.$item->section_image) }}" alt="Blog image" class="img-fluid">
                                                        </a>
                                                    </div>
                                                @endif
                                            @else
                                                @if (!empty($blog_detail_show->page_uri))
                                                    <div class="blog-img">
                                                        <a href="{{ url($blog_detail_show->page_uri.'/'.$item->slug) }}">
                                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid">
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="blog-img">
                                                        <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">
                                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid">
                                                        </a>
                                                    </div>
                                                @endif
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
                                                    @if (!empty($blog_detail_show->page_uri))
                                                        <a href="{{ url($blog_detail_show->page_uri.'/'.$item->slug) }}">{{ $item->title }}</a>
                                                    @else
                                                        <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                                    @endif
                                                </h5>
                                                @if (!empty($item->short_description)) <p>{{ $item->short_description }}</p> @endif
                                                @if (!empty($blog_detail_show->page_uri))
                                                    <a href="{{ url($blog_detail_show->page_uri.'/'.$item->slug) }}" class="blog-link">{{ __('frontend.read_more') }}
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}" class="blog-link">
                                                        {{ __('frontend.read_more') }}
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                @endif
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
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                                    <a href="#"><span><i class="far fa-bookmark"></i>Design</span></a>
                                                </div>
                                                <h5>
                                                    <a href="#">
                                                        How To Create A Design Brief
                                                    </a>
                                                </h5>
                                                <p>
                                                    It is a long established fact that a reader will be distracted [..]
                                                </p>
                                                <a href="#" class="blog-link">
                                                    Read More
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                                    <a href="#"><span><i class="far fa-bookmark"></i>Design</span></a>
                                                </div>
                                                <h5>
                                                    <a href="#">
                                                        Work On The Latest UI Design Models
                                                    </a>
                                                </h5>
                                                <p>
                                                    It is a long established fact that a reader will be distracted [..]
                                                </p>
                                                <a href="#" class="blog-link">
                                                    Read More
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                                    <a href="#"><span><i class="far fa-bookmark"></i>Design</span></a>
                                                </div>
                                                <h5>
                                                    <a href="#">
                                                        The Golden Rule Between Unique Design
                                                    </a>
                                                </h5>
                                                <p>
                                                    It is a long established fact that a reader will be distracted [..]
                                                </p>
                                                <a href="#" class="blog-link">
                                                    Read More
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                                    <a href="#"><span><i class="far fa-bookmark"></i>Wordpress</span></a>
                                                </div>
                                                <h5>
                                                    <a href="#">
                                                        How to set up a Wordpress website ?
                                                    </a>
                                                </h5>
                                                <p>
                                                    It is a long established fact that a reader will be distracted [..]
                                                </p>
                                                <a href="#" class="blog-link">
                                                    Read More
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                                    <a href="#"><span><i class="far fa-bookmark"></i>Laravel</span></a>
                                                </div>
                                                <h5>
                                                    <a href="#">
                                                        Creating projects in Laravel 8
                                                    </a>
                                                </h5>
                                                <p>
                                                    It is a long established fact that a reader will be distracted [..]
                                                </p>
                                                <a href="#" class="blog-link">
                                                    Read More
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                                    <a href="#"><span><i class="far fa-bookmark"></i>Wordpress</span></a>
                                                </div>
                                                <h5>
                                                    <a href="#">
                                                        How to create custom post type ?
                                                    </a>
                                                </h5>
                                                <p>
                                                    It is a long established fact that a reader will be distracted [..]
                                                </p>
                                                <a href="#" class="blog-link">
                                                    Read More
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    @endif
                    @endif

                </section>
                <!--// Blog Section End //-->

                @if(Auth::user())
                    @can('blog check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="blog.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}</button>
                </form>

                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="blog.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.add_blog') }}</button>
                </form>

            </div>
        </div>
    @endcan
@endif
