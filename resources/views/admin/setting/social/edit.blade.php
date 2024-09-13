@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_social') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('social.update', $social->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="social_media" id="social_media" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fab fa-facebook-f" {{ $social->social_media === "fab fa-facebook-f" ? 'selected' : '' }}>Facebook</option>
                                        <option value="fab fa-twitter" {{ $social->social_media === "fab fa-twitter" ? 'selected' : '' }}>Twitter</option>
                                        <option value="fab fa-google-plus-g" {{ $social->social_media === "fab fa-google-plus-g" ? 'selected' : '' }}>Google Plus</option>
                                        <option value="fab fa-youtube" {{ $social->social_media === "fab fa-youtube" ? 'selected' : '' }}>Youtube</option>
                                        <option value="fab fa-instagram" {{ $social->social_media === "fab fa-instagram" ? 'selected' : '' }}>Instagram</option>
                                        <option value="fab fa-vk" {{ $social->social_media === "fab fa-vk" ? 'selected' : '' }}>VK</option>
                                        <option value="fab fa-weibo" {{ $social->social_media === "fab fa-weibo" ? 'selected' : '' }}>Weibo</option>
                                        <option value="fab fa-weixin" {{ $social->social_media === "fab fa-weixin" ? 'selected' : '' }}>WeChat</option>
                                        <option value="fab fa-meetup" {{ $social->social_media === "fab fa-meetup" ? 'selected' : '' }}>Meetup</option>
                                        <option value="fab fa-wikipedia-w" {{ $social->social_media === "fab fa-wikipedia-w" ? 'selected' : '' }}>Wikipedia</option>
                                        <option value="fab fa-quora" {{ $social->social_media === "fab fa-quora" ? 'selected' : '' }}>Quora</option>
                                        <option value="fab fa-pinterest" {{ $social->social_media === "fab fa-pinterest" ? 'selected' : '' }}>Pinterest</option>
                                        <option value="fab fa-dribbble" {{ $social->social_media === "fab fa-dribbble" ? 'selected' : '' }}>Dribbble</option>
                                        <option value="fab fa-linkedin-in" {{ $social->social_media === "fab fa-linkedin-in" ? 'selected' : '' }}>Linkedin</option>
                                        <option value="fab fa-behance-square" {{ $social->social_media === "fab fa-behance-square" ? 'selected' : '' }}>Behance</option>
                                        <option value="fab fa-wordpress" {{ $social->social_media === "fab fa-wordpress" ? 'selected' : '' }}>WordPress</option>
                                        <option value="fab fa-blogger-b" {{ $social->social_media === "fab fa-blogger-b" ? 'selected' : '' }}>Blogger</option>
                                        <option value="fab fa-whatsapp" {{ $social->social_media === "fab fa-whatsapp" ? 'selected' : '' }}>Whatsapp</option>
                                        <option value="fab fa-telegram" {{ $social->social_media === "fab fa-telegram" ? 'selected' : '' }}>Telegram</option>
                                        <option value="fab fa-skype" {{ $social->social_media === "fab fa-skype" ? 'selected' : '' }}>Skype</option>
                                        <option value="fab fa-amazon" {{ $social->social_media === "fab fa-amazon" ? 'selected' : '' }}>Amazon</option>
                                        <option value="fab fa-stack-overflow" {{ $social->social_media === "fab fa-stack-overflow" ? 'selected' : '' }}>Stack Overflow</option>
                                        <option value="fab fa-stack-exchange" {{ $social->social_media === "fab fa-stack-exchange" ? 'selected' : '' }}>Stack Exchange</option>
                                        <option value="fab fa-github" {{ $social->social_media === "fab fa-github" ? 'selected' : '' }}>Github</option>
                                        <option value="fab fa-android" {{ $social->social_media === "fab fa-android" ? 'selected' : '' }}>Android</option>
                                        <option value="fab fa-vimeo-v" {{ $social->social_media === "fab fa-vimeo-v" ? 'selected' : '' }}>Vimeo</option>
                                        <option value="fab fa-tumblr" {{ $social->social_media === "fab fa-tumblr" ? 'selected' : '' }}>Tumblr</option>
                                        <option value="fab fa-vine" {{ $social->social_media === "fab fa-vine" ? 'selected' : '' }}>Vine</option>
                                        <option value="fab fa-twitch" {{ $social->social_media === "fab fa-twitch" ? 'selected' : '' }}>Twitch</option>
                                        <option value="fab fa-flickr" {{ $social->social_media === "fab fa-flickr" ? 'selected' : '' }}>Flickr</option>
                                        <option value="fab fa-yahoo" {{ $social->social_media === "fab fa-yahoo" ? 'selected' : '' }}>Yahoo</option>
                                        <option value="fab fa-reddit" {{ $social->social_media === "fab fa-reddit" ? 'selected' : '' }}>Reddit</option>
                                        <option value="fas fa-rss" {{ $social->social_media === "fas fa-rs" ? 'selected' : '' }}>Rss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">{{ __('content.url') }}</label>
                                    <input id="url" type="text" name="url" value="{{ $social->url }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $social->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $social->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
