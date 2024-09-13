<div>

    @if ($style == 'style1')

        @if(Auth::user())
            @can('section check')
                <div class="easier-mode">
                    <div class="easier-section-area">
                        @endcan
                        @endif

                        <!--// Subscribe Section Start //-->
                        <div class="subscribe-section section">
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
                                @isset ($subscribe)
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="subscribe-heading">
                                                <h2>{{ $subscribe->title }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="subscribe-heading">
                                                    <h2>Subscribe to the newsletter to be informed about us</h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endisset
                                <form wire:submit="save">
                                    <div class="subscribe-form-group">
                                        <input type="email" wire:model="email" class="subscribe-form-input" placeholder="{{ __('frontend.enter_your_email') }}">
                                        <button type="submit"  class="white-btn">
                                            <span class="text">{{ __('frontend.subscribe') }}</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </button>
                                    </div>
                                    <div class="mt-2 text-white text-center">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                        @if($message = Session::get('success'))
                                            <span class="error">{{ __($message) }}</span>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--// Subscribe Section End //-->

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
                            <input type="hidden" name="route" value="subscribe-section.create">
                            <input type="hidden" name="style" value="style1">
                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                            <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.edit_subscribe') }}</button>
                        </form>
                    </div>
                </div>
            @endcan
        @endif

    @endif

</div>
