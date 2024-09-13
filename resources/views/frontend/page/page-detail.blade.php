<!--// Career Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mx-auto">

                @if(Auth::user())
                    @can('page check')
                        <div class="easier-mode">
                            @if(Auth::user())
                                @can('page check')
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

                                <div class="services-detail-top">
                                        @if (!empty($page->section_image))
                                            <img src="{{ asset('uploads/img/page/'.$page->section_image) }}" alt="Services image" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="services-detail-inner">
                                        <p>@php echo html_entity_decode($page->description); @endphp</p>
                                    </div>

                                @if(Auth::user())
                                    @can('page check')
                            </div>
                            <div class="easier-middle">
                                @php
                                    $url = request()->path();
                                    $modified_url = str_replace('/', '-bracket-', $url);
                                @endphp
                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="route" value="page.edit">
                                    <input type="hidden" name="style" value="{{ $page->id }}">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white me-2">
                                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_page') }}
                                    </button>
                                </form>

                            </div>


                        </div>
                    @endcan
                @endif


            </div>
        </div>
    </div>
</section>
<!--// Career Section End //-->

