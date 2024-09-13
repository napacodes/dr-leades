@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.side_buttons') }}</h4>
                @if (isset($side_button_widget))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('quick-access.update', $side_button_widget->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="social_media" id="social_media" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fab fa-facebook-f" {{ $side_button_widget->social_media === "fab fa-facebook-f" ? 'selected' : '' }}>Facebook</option>
                                        <option value="fab fa-twitter" {{ $side_button_widget->social_media === "fab fa-twitter" ? 'selected' : '' }}>Twitter</option>
                                        <option value="fab fa-google-plus-g" {{ $side_button_widget->social_media === "fab fa-google-plus-g" ? 'selected' : '' }}>Google Plus</option>
                                        <option value="fab fa-youtube" {{ $side_button_widget->social_media === "fab fa-youtube" ? 'selected' : '' }}>Youtube</option>
                                        <option value="fab fa-instagram" {{ $side_button_widget->social_media === "fab fa-instagram" ? 'selected' : '' }}>Instagram</option>
                                        <option value="fab fa-vk" {{ $side_button_widget->social_media === "fab fa-vk" ? 'selected' : '' }}>VK</option>
                                        <option value="fab fa-weibo" {{ $side_button_widget->social_media === "fab fa-weibo" ? 'selected' : '' }}>Weibo</option>
                                        <option value="fab fa-weixin" {{ $side_button_widget->social_media === "fab fa-weixin" ? 'selected' : '' }}>WeChat</option>
                                        <option value="fab fa-meetup" {{ $side_button_widget->social_media === "fab fa-meetup" ? 'selected' : '' }}>Meetup</option>
                                        <option value="fab fa-wikipedia-w" {{ $side_button_widget->social_media === "fab fa-wikipedia-w" ? 'selected' : '' }}>Wikipedia</option>
                                        <option value="fab fa-quora" {{ $side_button_widget->social_media === "fab fa-quora" ? 'selected' : '' }}>Quora</option>
                                        <option value="fab fa-pinterest" {{ $side_button_widget->social_media === "fab fa-pinterest" ? 'selected' : '' }}>Pinterest</option>
                                        <option value="fab fa-dribbble" {{ $side_button_widget->social_media === "fab fa-dribbble" ? 'selected' : '' }}>Dribbble</option>
                                        <option value="fab fa-linkedin-in" {{ $side_button_widget->social_media === "fab fa-linkedin-in" ? 'selected' : '' }}>Linkedin</option>
                                        <option value="fab fa-behance-square" {{ $side_button_widget->social_media === "fab fa-behance-square" ? 'selected' : '' }}>Behance</option>
                                        <option value="fab fa-wordpress" {{ $side_button_widget->social_media === "fab fa-wordpress" ? 'selected' : '' }}>WordPress</option>
                                        <option value="fab fa-blogger-b" {{ $side_button_widget->social_media === "fab fa-blogger-b" ? 'selected' : '' }}>Blogger</option>
                                        <option value="fab fa-whatsapp" {{ $side_button_widget->social_media === "fab fa-whatsapp" ? 'selected' : '' }}>Whatsapp</option>
                                        <option value="fab fa-telegram" {{ $side_button_widget->social_media === "fab fa-telegram" ? 'selected' : '' }}>Telegram</option>
                                        <option value="fab fa-skype" {{ $side_button_widget->social_media === "fab fa-skype" ? 'selected' : '' }}>Skype</option>
                                        <option value="fab fa-amazon" {{ $side_button_widget->social_media === "fab fa-amazon" ? 'selected' : '' }}>Amazon</option>
                                        <option value="fab fa-stack-overflow" {{ $side_button_widget->social_media === "fab fa-stack-overflow" ? 'selected' : '' }}>Stack Overflow</option>
                                        <option value="fab fa-stack-exchange" {{ $side_button_widget->social_media === "fab fa-stack-exchange" ? 'selected' : '' }}>Stack Exchange</option>
                                        <option value="fab fa-github" {{ $side_button_widget->social_media === "fab fa-github" ? 'selected' : '' }}>Github</option>
                                        <option value="fab fa-android" {{ $side_button_widget->social_media === "fab fa-android" ? 'selected' : '' }}>Android</option>
                                        <option value="fab fa-vimeo-v" {{ $side_button_widget->social_media === "fab fa-vimeo-v" ? 'selected' : '' }}>Vimeo</option>
                                        <option value="fab fa-tumblr" {{ $side_button_widget->social_media === "fab fa-tumblr" ? 'selected' : '' }}>Tumblr</option>
                                        <option value="fab fa-vine" {{ $side_button_widget->social_media === "fab fa-vine" ? 'selected' : '' }}>Vine</option>
                                        <option value="fab fa-twitch" {{ $side_button_widget->social_media === "fab fa-twitch" ? 'selected' : '' }}>Twitch</option>
                                        <option value="fab fa-flickr" {{ $side_button_widget->social_media === "fab fa-flickr" ? 'selected' : '' }}>Flickr</option>
                                        <option value="fab fa-yahoo" {{ $side_button_widget->social_media === "fab fa-yahoo" ? 'selected' : '' }}>Yahoo</option>
                                        <option value="fab fa-reddit" {{ $side_button_widget->social_media === "fab fa-reddit" ? 'selected' : '' }}>Reddit</option>
                                        <option value="fas fa-rss" {{ $side_button_widget->social_media === "fas fa-rs" ? 'selected' : '' }}>Rss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link">{{ __('content.url') }}</label>
                                    <input id="link" type="text" name="link" value="{{ $side_button_widget->link }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable" {{ $side_button_widget->status === 'enable' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="disable" {{ $side_button_widget->status === 'disable' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="contact" id="contact" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fas fa-envelope" {{ $side_button_widget->contact === "fas fa-envelope" ? 'selected' : '' }}>Email</option>
                                        <option value="fas fa-whatsapp" {{ $side_button_widget->contact === "fas fa-whatsapp" ? 'selected' : '' }}>Whatsapp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_whatsapp">{{ __('content.email_or_whatsapp') }}</label>
                                    <input id="email_or_whatsapp" type="text" name="email_or_whatsapp" value="{{ $side_button_widget->email_or_whatsapp }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_whatsapp">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status_whatsapp" id="status_whatsapp">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable" {{ $side_button_widget->status_whatsapp === 'enable' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="disable" {{ $side_button_widget->status_whatsapp === 'disable' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="phone">{{ __('content.phone') }}</label>
                                    <input id="phone" type="text" name="phone" value="{{ $side_button_widget->phone }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_phone">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status_phone" id="status_phone">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable" {{ $side_button_widget->status_phone === 'enable' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="disable" {{ $side_button_widget->status_phone === 'disable' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('quick-access.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="social_media" id="social_media" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fab fa-facebook-f">Facebook</option>
                                        <option value="fab fa-twitter">Twitter</option>
                                        <option value="fab fa-google-plus-g">Google Plus</option>
                                        <option value="fab fa-youtube">Youtube</option>
                                        <option value="fab fa-instagram">Instagram</option>
                                        <option value="fab fa-vk">VK</option>
                                        <option value="fab fa-weibo">Weibo</option>
                                        <option value="fab fa-weixin">WeChat</option>
                                        <option value="fab fa-meetup">Meetup</option>
                                        <option value="fab fa-wikipedia-w">Wikipedia</option>
                                        <option value="fab fa-quora">Quora</option>
                                        <option value="fab fa-pinterest">Pinterest</option>
                                        <option value="fab fa-dribbble">Dribbble</option>
                                        <option value="fab fa-linkedin-in">Linkedin</option>
                                        <option value="fab fa-behance-square">Behance</option>
                                        <option value="fab fa-wordpress">WordPress</option>
                                        <option value="fab fa-blogger-b">Blogger</option>
                                        <option value="fab fa-whatsapp">Whatsapp</option>
                                        <option value="fab fa-telegram">Telegram</option>
                                        <option value="fab fa-skype">Skype</option>
                                        <option value="fab fa-amazon">Amazon</option>
                                        <option value="fab fa-stack-overflow">Stack Overflow</option>
                                        <option value="fab fa-stack-exchange">Stack Exchange</option>
                                        <option value="fab fa-github">Github</option>
                                        <option value="fab fa-android">Android</option>
                                        <option value="fab fa-vimeo-v">Vimeo</option>
                                        <option value="fab fa-tumblr">Tumblr</option>
                                        <option value="fab fa-vine">Vine</option>
                                        <option value="fab fa-twitch">Twitch</option>
                                        <option value="fab fa-flickr">Flickr</option>
                                        <option value="fab fa-yahoo">Yahoo</option>
                                        <option value="fab fa-reddit">Reddit</option>
                                        <option value="fas fa-rss">Rss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link">{{ __('content.url') }} <span class="text-red">*</span></label>
                                    <input type="text" name="link" class="form-control" id="link" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable">{{ __('content.enable') }}</option>
                                        <option value="disable">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="contact" id="contact" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fas fa-envelope">Email</option>
                                        <option value="fas fa-whatsapp">Whatsapp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_whatsapp">{{ __('content.email_or_whatsapp') }} <span class="text-red">*</span></label>
                                    <input type="text" name="email_or_whatsapp" class="form-control" id="email_or_whatsapp" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_whatsapp">{{ __('content.status') }}</label>
                                    <select name="status_whatsapp" class="form-control" id="status_whatsapp">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable">{{ __('content.enable') }}</option>
                                        <option value="disable">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="phone">{{ __('content.phone') }}</label>
                                    <input id="phone" type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_phone">{{ __('content.status') }}</label>
                                    <select name="status_phone" class="form-control" id="status_phone">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable">{{ __('content.enable') }}</option>
                                        <option value="disable">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.bottom_buttons') }}</h4>
                @if (isset($bottom_button_widget))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('quick-access-bottom.update', $bottom_button_widget->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="button_name">{{ __('content.button_name') }}</label>
                                        <input id="button_name" type="text" name="button_name" value="{{ $bottom_button_widget->button_name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">{{ __('content.phone') }}</label>
                                        <input id="phone" type="text" name="phone" value="{{ $bottom_button_widget->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">{{ __('content.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="enable" {{ $bottom_button_widget->status === 'enable' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                            <option value="disable" {{ $bottom_button_widget->status === 'disable' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="button_name_2">{{ __('content.button_name_2') }}</label>
                                        <input id="button_name_2" type="text" name="button_name_2" value="{{ $bottom_button_widget->button_name_2 }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="whatsapp">{{ __('content.whatsapp') }}</label>
                                        <input id="whatsapp" type="text" name="whatsapp" value="{{ $bottom_button_widget->whatsapp }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status_whatsapp">{{ __('content.status') }}</label>
                                        <select class="form-control" name="status_whatsapp" id="status_whatsapp">
                                            <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="enable" {{ $bottom_button_widget->status_whatsapp === 'enable' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                            <option value="disable" {{ $bottom_button_widget->status_whatsapp === 'disable' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                </div>
                            </div>
                        </form>
                        @else
                            @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('quick-access-bottom.store') }}" method="POST">
                                    @csrf
                                    @endif

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="button_name">{{ __('content.button_name') }}</label>
                                                <input id="button_name" type="text" name="button_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">{{ __('content.phone') }} </label>
                                                <input type="text" name="phone" class="form-control" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">{{ __('content.status') }}</label>
                                                <select name="status" class="form-control" id="status">
                                                    <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                                    <option value="enable">{{ __('content.enable') }}</option>
                                                    <option value="disable">{{ __('content.disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="button_name_2">{{ __('content.button_name_2') }}</label>
                                                <input id="button_name_2" type="text" name="button_name_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="whatsapp">{{ __('content.whatsapp') }}</label>
                                                <input type="text" name="whatsapp" class="form-control" id="whatsapp">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status_whatsapp">{{ __('content.status') }}</label>
                                                <select name="status_whatsapp" class="form-control" id="status_whatsapp">
                                                    <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                                    <option value="enable">{{ __('content.enable') }}</option>
                                                    <option value="disable">{{ __('content.disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
