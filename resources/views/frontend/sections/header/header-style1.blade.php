<!--// Header Start //-->
<header class="header fixed-top" id="header">
    <div id="nav-menu-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                @isset ($header_image_style1)
                    <a class="navbar-brand" title="Home" href="{{ url('/') }}">
                        @if (!empty($header_image_style1->section_image))
                            <img src="{{ asset('uploads/img/general/'.$header_image_style1->section_image) }}" alt="Logo White" class="img-fluid logo-transparent">
                        @endif
                        @if (!empty($header_image_style1->section_image_2))
                            <img src="{{ asset('uploads/img/general/'.$header_image_style1->section_image_2) }}" alt="Logo Black" class="img-fluid logo-normal">
                        @endif
                    </a>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                        <a class="navbar-brand" title="Home" href="#">
                            <img src="{{ asset('uploads/img/dummy/your-logo.jpg') }}" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="{{ asset('uploads/img/dummy/your-logo.jpg') }}" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    @endif
                @endisset
                @if(Auth::user())
                    @can('setting check')
                        @php
                            $url = request()->path();
                            $modified_url = str_replace('/', '-bracket-', $url);
                        @endphp
                        <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                            @csrf
                            <input type="hidden" name="route" value="header-image.create">
                            <input type="hidden" name="style" value="style1">
                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                            <button type="submit" class="custom-btn text-white"> <i class="fa fa-edit text-white"></i> </button>
                        </form>
                    @endcan
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fixedNavbar"
                        aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        @if (is_countable($menus) && count($menus) > 0)
                            @foreach ($menus as $menu)
                                @if ($menu->submenus->count() > 0)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="{{ $menu->menu_name }}DropdownMenu" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ $menu->menu_name }}
                                        </a>
                                        @if ($menu->submenus->count() > 0)
                                            <div class="dropdown-menu" aria-labelledby="{{ $menu->menu_name }}DropdownMenu">
                                                @foreach ($menu->submenus as $submenu)
                                                    <a class="dropdown-item" href="@if (!empty($submenu->uri)) @if ((session()->has('language_name_from_dropdown') && $language->language_code == session()->get('language_code_from_dropdown')) || !session()->has('language_name_from_dropdown') ) {{ url($submenu->uri) }} @elseif (session()->has('language_name_from_dropdown')) {{ url($submenu->uri) }} @endif  @elseif (!empty($submenu->url)) {{ $submenu->url }} @else # @endif">{{ $submenu->submenu_name }}</a>
                                                @endforeach
                                                @unset ($submenu)
                                            </div>
                                        @endif
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="@if (!empty($menu->uri)) @if ((session()->has('language_name_from_dropdown') && $language->language_code == session()->get('language_code_from_dropdown')) || !session()->has('language_name_from_dropdown') ) {{ url($menu->uri) }} @elseif (session()->has('language_name_from_dropdown')) {{ url($menu->uri) }} @endif  @elseif (!empty($menu->url)) {{ $menu->url }} @else # @endif">{{ $menu->menu_name }}</a>
                                    </li>
                                @endif
                            @endforeach
                            @unset ($menu)

                            @if (is_countable($display_dropdowns) && count($display_dropdowns) > 0)
                                @php
                                    $url = request()->path();
                                    $modified_url = str_replace('/', '-bracket-', $url);
                                @endphp

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="langDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="langDropdownMenu">
                                        @foreach ($display_dropdowns as $display_dropdown)
                                            <a class="dropdown-item" href="{{ url('language/set-locale/'.$display_dropdown->id.'/'.$modified_url) }}">{{ $display_dropdown->language_name }}</a>
                                        @endforeach
                                        @unset ($display_dropdown)
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    @if (Auth::user())
                                        @can('menu check')
                                            @php
                                                $url = request()->path();
                                                $modified_url = str_replace('/', '-bracket-', $url);
                                            @endphp
                                            <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="route" value="menu.create">
                                                <input type="hidden" name="style" value="">
                                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                <button type="submit" class="custom-btn text-white">
                                                    <i class="fa fa-edit text-white"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    @endif
                                </a>
                            </li>

                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="homeDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Home
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="homeDropdownMenu">
                                        <a class="dropdown-item" href="#">Home Default</a>
                                        <a class="dropdown-item" href="#">Home Particles</a>
                                        <a class="dropdown-item" href="#">Home Slider</a>
                                        <a class="dropdown-item" href="#">Home Video</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#">About Us</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="serviceDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Services
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="serviceDropdownMenu">
                                        <a class="dropdown-item" href="#">Services</a>
                                        <a class="dropdown-item" href="#">Web Design</a>
                                        <a class="dropdown-item" href="#">Graphic Design</a>
                                        <a class="dropdown-item" href="#">UI/UX Design</a>
                                        <a class="dropdown-item" href="#">Content Writing</a>
                                        <a class="dropdown-item" href="#">Scripts & Plugin</a>
                                        <a class="dropdown-item" href="#">Digital Marketing</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="pageDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="pageDropdownMenu">
                                        <a class="dropdown-item" href="#">Faq</a>
                                        <a class="dropdown-item" href="#">Gallery</a>
                                        <a class="dropdown-item" href="#">Team</a>
                                        <a class="dropdown-item" href="#">Portfolio</a>
                                        <a class="dropdown-item" href="#">Plan</a>
                                        <a class="dropdown-item" href="#">Career</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Blogs
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="blogDropdownMenu">
                                        <a class="dropdown-item" href="#">Blog Grid</a>
                                        <a class="dropdown-item" href="#">Blog Single</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#">Contact</a>
                                </li>
                                @if (is_countable($display_dropdowns) && count($display_dropdowns) > 0)
                                    @php
                                        $url = request()->path();
                                        $modified_url = str_replace('/', '-bracket-', $url);
                                    @endphp

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="langDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="langDropdownMenu">
                                            @foreach ($display_dropdowns as $display_dropdown)
                                                <a class="dropdown-item" href="{{ url('language/set-locale/'.$display_dropdown->id.'/'.$modified_url) }}">{{ $display_dropdown->language_name }}</a>
                                            @endforeach
                                            @unset ($display_dropdown)
                                        </div>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        @if (Auth::user())
                                            @can('menu check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="menu.create">
                                                    <input type="hidden" name="style" value="">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="custom-btn text-white">
                                                        <i class="fa fa-edit text-white"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                    </a>
                                </li>

                            @endif
                        @endif
                        @isset ($external_url)
                            <li class="nav-item navbar-btn-resp d-flex align-items-center">
                                @if (!empty($external_url->button_name))
                                    <a href="{{ $external_url->button_url }}" class="primary-btn">
                                        <span class="text">{{ $external_url->button_name }}</span>
                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                @endif
                                @if (Auth::user())
                                    @can('setting check')
                                        @php
                                            $url = request()->path();
                                            $modified_url = str_replace('/', '-bracket-', $url);
                                        @endphp
                                        <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                            @csrf
                                            <input type="hidden" name="route" value="external-url.create">
                                            <input type="hidden" name="style" value="">
                                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                            <button type="submit" class="custom-btn text-white">
                                                <i class="fa fa-edit text-white"></i>
                                            </button>
                                        </form>
                                    @endcan
                                @endif
                            </li>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <li class="nav-item navbar-btn-resp d-flex align-items-center">
                                    <a href="#" class="primary-btn">
                                        <span class="text">Get Started</span>
                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                    @if (Auth::user())
                                        @can('setting check')
                                            @php
                                                $url = request()->path();
                                                $modified_url = str_replace('/', '-bracket-', $url);
                                            @endphp
                                            <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="route" value="external-url.create">
                                                <input type="hidden" name="style" value="">
                                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                <button type="submit" class="custom-btn text-white">
                                                    <i class="fa fa-edit text-white"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    @endif
                                </li>
                            @endif
                        @endisset
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--// Header End  //-->

