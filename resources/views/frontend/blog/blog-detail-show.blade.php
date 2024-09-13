<!--// Blog Sidebar Section Start //-->
<section class="section padding-minus-90" id="blog-sidebar-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @if(Auth::user())
                    @can('blog check')
                        <div class="easier-mode">
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
                            <div class="easier-section-area">
                                @endcan
                                @endif

                                @isset ($blog)
                                    <div class="blog-post-single">
                                        @if (!empty($blog->section_image_2))
                                            <div class="blog-post-img">
                                                <img src="{{ asset('uploads/img/blog/'.$blog->section_image_2) }}" alt="Blog Post Image" class="img-fluid">
                                            </div>
                                        @endif
                                        <div class="blog-text">
                                            <h4>{{ $blog->title }}</h4>
                                            <div class="author-meta">
                                                <a href="#"><span class="far fa-calendar-alt"></span>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</a>
                                                <a href="#"><span class="far fa-bookmark"></span>{{ $blog->category_name }}</a>
                                            </div>
                                            <p>@php echo html_entity_decode($blog->description); @endphp</p>
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="blog-post-single">
                                        <div class="blog-post-img">
                                            <img src="{{ asset('uploads/img/dummy/800x600.jpg') }}" alt="Blog Post Image" class="img-fluid">
                                        </div>
                                        <div class="blog-text">
                                            <h4>Creating projects in Laravel 11</h4>
                                            <div class="author-meta">
                                                <a href="#"><span class="far fa-user"></span>By Admin</a>
                                                <a href="#"><span class="far fa-calendar-alt"></span>17 Auqust 2024</a>
                                            </div>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less
                                                normal distribution of letters, as opposed to using 'Content here,
                                                content here', making it look like readable English.
                                                Many desktop publishing packages and web page editors now use
                                                Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
                                                will uncover many web sites still in their infancy.
                                                Various versions have evolved over the years, sometimes
                                                by accident, sometimes on purpose (injected humour and the like).
                                            </p>
                                            <blockquote>
                                                <q>
                                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                                    below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                                                    Bonorum et Malorum" by Cicero are also reproduced in their exact original
                                                    form, accompanied by English versions from the 1914 translation by H. Rackham.
                                                </q>
                                            </blockquote>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 grid-gallery-item">
                                                    <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Blog Grid image" class="img-fluid">
                                                </div>
                                                <div class="col-md-6 col-sm-6 grid-gallery-item">
                                                    <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Blog Grid image" class="img-fluid">
                                                </div>
                                            </div>
                                            <h5>List Item</h5>
                                            <ul>
                                                <li>Lorem Ipsum is simply dummy text of the printing </li>
                                                <li>When an unknown printer took a galley of type</li>
                                                <li>And scrambled it to make a type specimen book. </li>
                                                <li>It was popularised in the 1960s with the</li>
                                                <li>Letraset sheets containing Lorem Ipsum passages</li>
                                            </ul>
                                            <p>
                                                Many desktop publishing packages and web page editors now use
                                                Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
                                                will uncover many web sites still in their infancy.
                                                Various versions have evolved over the years, sometimes
                                                by accident, sometimes on purpose (injected humour and the like).
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                @endisset

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
                                    <input type="hidden" name="route" value="blog.edit">
                                    <input type="hidden" name="style" value="{{ $blog->id }}">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white me-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_blog') }}
                                    </button>
                                </form>

                            </div>

                        </div>
                    @endcan
                @endif

            </div>

            <div class="col-lg-4">
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

                    @if(Auth::user())
                        @can('blog check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    <div class="sidebar-widgets">
                                        <h5 class="inner-header-title">{{ __('content.categories') }}</h5>
                                        <ul class="sidebar-category-list clearfix">
                                            @foreach ($blog_count_categories as $blog_count_category)
                                                @if (isset($blog_count_category->category->category_slug))
                                                        <li class="@if ($blog_count_category->category->category_name == $blog->category_name) active @endif"><a href="{{ route('default-blog-category-index', $blog_count_category->category->category_slug) }}">{{$blog_count_category->category->category_name }} <span class="category-count">({{ $blog_count_category->category_count }})</span></a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

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
                                        <input type="hidden" name="route" value="category.create">
                                        <input type="hidden" name="style" value="">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_category') }}
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endcan
                    @endif

                    @if (is_countable($recent_posts) && count($recent_posts) > 0)
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.recent_blogs') }}</h5>
                            @foreach ($recent_posts as $item)
                                <div class="recent-post-item clearfix">
                                    <div class="recent-post-img mr-3">
                                        <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">
                                            @if (!empty($item->section_image))
                                                <img src="{{ asset('uploads/img/blog/thumbnail/'.$item->section_image) }}" class="img-fluid image-size-100" alt="blog image">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="blog image">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="recent-post-body">
                                        <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">
                                            <h6 class="recent-post-title">{{ $item->title }}</h6>
                                        </a>
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

                    @if (!empty($blog->tag))
                        @php
                            $str = $blog->tag;
                            $array_tags = explode(",",$str);
                        @endphp
                        <div class="sidebar-widgets tag-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.tags') }}</h5>
                            <ul class="sidebar-tags clearfix">
                                @foreach ($array_tags as $tag)
                                    @if (!empty($blog_tag_index->page_uri))
                                        <li><a href="{{ url($blog_tag_index->page_uri.'/'.$tag) }}">{{ $tag }}</a></li>
                                    @else
                                        <li><a href="{{ route('default-blog-tag-index', $tag) }}">{{ $tag }}</a></li>
                                    @endif
                                @endforeach
                                @unset ($tag)
                            </ul>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!--// Blog Grid Sidebar End //-->



