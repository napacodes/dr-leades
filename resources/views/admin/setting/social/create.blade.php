@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.socials') }}</h6>
                        <div>
                           <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#socialModal">+ {{ __('content.add_social') }}</button>
                        </div>
                        </div>

                    @if (count($socials) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.socials') }}</th>
                                <th>{{ __('content.url') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($socials as $social)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><i class="{{ $social->social_media }}"></i></td>
                                    <td>{{ $social->url }}</td>
                                    <td>
                                        <form action="{{ route('social.update_status', $social->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @if ($social->status == 1)
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('content.disable') }}
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('content.enable') }}
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('social.edit', $social->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModel{{ $social->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                    <div class="modal fade" id="deleteModel{{ $social->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                                </div>
                                                <div class="modal-footer">
                                                @if ($demo_mode == "on")
                                                    <!-- Include Alert Blade -->
                                                        @include('admin.demo_mode.demo-mode')
                                                    @else
                                                        <form class="d-inline-block" action="{{ route('social.destroy', $social->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            @endif

                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
    <div class="modal fade" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="socialModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="socialModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('social.store') }}" method="POST">
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="social_media"  class="col-form-label">{{ __('content.icon') }} <span class="text-red">*</span></label>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">{{ __('content.url') }}</label>
                                    <input type="text" name="url" class="form-control" id="url">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
