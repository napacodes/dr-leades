@if(Auth::user())
    @can('team check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <!--// Team Section Start //-->
                <section class="section" id="team">
                    <div class="container">
                        @if(Auth::user())
                            @can('team check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_countable($team_count_categories) && count($team_count_categories) > 0)
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="{{ url($team_index->page_uri) }}" class="mb-2">{{ __('frontend.all_teams') }}</a>
                                        @foreach ($team_count_categories as $team_count_category)
                                            @if (isset($team_count_category->team_category->team_category_slug))
                                                    <a class="@if ($category->category_name == $team_count_category->team_category->category_name) current @endif mb-2" href="{{ route('default-team-category-index', $team_count_category->team_category->team_category_slug) }}">{{$team_count_category->team_category->category_name }} ({{ $team_count_category->category_count }})</a>
                                            @endif
                                        @endforeach
                                        @unset ($team_count_category)
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="#" class="link-dark">Management</a>
                                        <a href="#" class="link-secondary">Departments</a>
                                        <a href="#" class="link-secondary">Business Development</a>
                                        <a href="#" class="link-secondary">Research & Development</a>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if (is_countable($teams_paginate_style) && count($teams_paginate_style) > 0)
                            <div class="row">
                                @foreach ($teams_paginate_style as $item)
                                    <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.{{ $loop->iteration }}s">
                                        <div class="team-card">
                                            @if(Auth::user())
                                                @can('team check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="team.edit">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button ">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            @if (!empty($item->section_image))
                                                <div class="img">
                                                    <img class="custom-max-width-200" src="{{ asset('uploads/img/team/'.$item->section_image) }}" alt="Team image">
                                                </div>
                                            @endif
                                            <div class="body">
                                                <div class="text">
                                                    <h5>{{ $item->name }}</h5>
                                                    <p>{{ $item->job }}</p>
                                                </div>
                                                <div class="social">
                                                    <ul>
                                                        @if (!empty($item->facebook_url)) <li><a href="{{ $item->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li> @endif
                                                        @if (!empty($item->twitter_url)) <li><a href="{{ $item->twitter_url }}"><i class="fab fa-twitter"></i></a></li> @endif
                                                        @if (!empty($item->instagram_url)) <li><a href="{{ $item->instagram_url }}"><i class="fab fa-instagram"></i></a></li> @endif
                                                        @if (!empty($item->youtube_url)) <li><a href="{{ $item->youtube_url }}"><i class="fab fa-youtube"></i></a></li> @endif
                                                        @if (!empty($item->linkedin_url)) <li><a href="{{ $item->linkedin_url }}"><i class="fab fa-linkedin"></i></a></li> @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="row mt-5">
                                <div class="col-xl-12">
                                    <div class="easier-pagination-container">
                                        {{ $teams_paginate_style->links() }}
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row">
                                <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                    <div class="team-card">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/200x200.jpg') }}" alt="Team image">
                                        </div>
                                        <div class="body">
                                            <div class="text">
                                                <h5>George Avenue</h5>
                                                <p>Web Designer</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.2s">
                                    <div class="team-card">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/200x200.jpg') }}" alt="Team image">
                                        </div>
                                        <div class="body">
                                            <div class="text">
                                                <h5>Dominick A. Gray</h5>
                                                <p>App Developer</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                    <div class="team-card">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/200x200.jpg') }}" alt="Team image">
                                        </div>
                                        <div class="body">
                                            <div class="text">
                                                <h5>Michael L. Lloyd</h5>
                                                <p>UI Designer</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endif
                    </div>
                </section>
                <!--// Team Section End //-->

                @if(Auth::user())
                    @can('team check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="team.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}</button>
                </form>

                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="team.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.add_team') }}</button>
                </form>

            </div>
        </div>
    @endcan
@endif
