@if(Auth::user())
    @can('blog check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Blog Section Start //-->
                <section class="section pb-minus-76" id="blog">
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
                        @isset ($blog_section_style1)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>@php echo html_entity_decode($blog_section_style1->section_title); @endphp</span>
                                        <h2>@php echo html_entity_decode($blog_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>Blog</span>
                                        <h2>Our Blog</h2>
                                    </div>
                                </div>
                            </div>
                                @endif
                        @endisset
                            @if (is_countable($blogs_style1) && count($blogs_style1) > 0)
                            <div class="owl-carousel owl-theme" id="blogCarousel">
                                @foreach ($blogs_style1 as $item)
                                    <div class="item">
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
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="owl-carousel owl-theme" id="blogCarousel">
                                    <div class="item">
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
                                    <div class="item">
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
                                    <div class="item">
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
                                    <div class="item">
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
                                </div>
                                @endif
                            @endif
                            <div class="row mt-5">
                                @isset ($blog_section_style1)
                                    <div class="col-md-12 text-center">
                                        <a href="{{ $blog_section_style1->button_url }}" class="primary-btn">
                                            <span class="text">{{ $blog_section_style1->button_name }}</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-md-12 text-center">
                                        <a href="javascript:void(0)" class="primary-btn">
                                            <span class="text">Get Started</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    @endif
                                @endisset
                            </div>
                    </div>
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
                    <input type="hidden" name="route" value="blog.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="blog.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_blog') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
