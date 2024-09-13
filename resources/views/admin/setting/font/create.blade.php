@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.font') }}</h4>
                @if (isset($font))
                    <form action="{{ route('font.update', $font->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_font_link">{{ __('content.title_font_link') }}</label>
                                    <input type="text" name="title_font_link" class="form-control" id="title_font_link" value="{{ $font->title_font_link }}" placeholder="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">
                                    <small class="form-text text-muted">{{ __('content.google_font_find_the_font_that_suits_you_and_copy_the_link_here') }} <a href="https://fonts.google.com/" target="_blank">Google Fonts</a></small>
                                    <code>
                                        &lt;link href="<span class="text-success font-weight-bold">https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap</span>" rel="stylesheet"&gt;
                                    </code>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_font_family">{{ __('content.title_font_family') }} </label>
                                    <input type="text" name="title_font_family" class="form-control" id="title_font_family" placeholder="'Poppins', sans-serif" value="{{ $font->title_font_family }}">
                                    <small class="form-text text-muted">{{ __('content.find_the_font_family_and_put_it_here') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text_font_link">{{ __('content.text_font_link') }}</label>
                                    <input type="text" name="text_font_link" class="form-control" id="text_font_link" value="{{ $font->text_font_link }}"  placeholder="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
                                    <small class="form-text text-muted">{{ __('content.google_font_find_the_font_that_suits_you_and_copy_the_link_here') }} <a href="https://fonts.google.com/" target="_blank">Google Fonts</a></small>
                                    <code>
                                        &lt;link href="<span class="text-success font-weight-bold">https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap</span>" rel="stylesheet"&gt;
                                    </code>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text_font_family">{{ __('content.text_font_family') }} </label>
                                    <input type="text" name="text_font_family" class="form-control" id="text_font_family" placeholder="'Roboto', sans-serif" value="{{ $font->text_font_family }}">
                                    <small class="form-text text-muted">{{ __('content.find_the_font_family_and_put_it_here') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#fontDestroyModal{{ $font->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="fontDestroyModal{{ $font->id }}" tabindex="-1" role="dialog" aria-labelledby="fontDestroyModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fontDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                </div>
                                <div class="modal-footer">
                                    <form class="d-inline-block" action="{{ route('font.destroy', $font->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                        <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    <form action="{{ route('font.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_font_link">{{ __('content.title_font_link') }}</label>
                                    <input type="text" name="title_font_link" class="form-control" id="title_font_link" placeholder="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">
                                    <small class="form-text text-muted">{{ __('content.google_font_find_the_font_that_suits_you_and_copy_the_link_here') }} <a href="https://fonts.google.com/" target="_blank">Google Fonts</a></small>
                                    <code>
                                        &lt;link href="<span class="text-success font-weight-bold">https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap</span>" rel="stylesheet"&gt;
                                    </code>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_font_family">{{ __('content.title_font_family') }} </label>
                                    <input type="text" name="title_font_family" class="form-control" id="title_font_family" placeholder="'Poppins', sans-serif">
                                    <small class="form-text text-muted">{{ __('content.find_the_font_family_and_put_it_here') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text_font_link">{{ __('content.text_font_link') }}</label>
                                    <input type="text" name="text_font_link" class="form-control" id="text_font_link" placeholder="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
                                    <small class="form-text text-muted">{{ __('content.google_font_find_the_font_that_suits_you_and_copy_the_link_here') }} <a href="https://fonts.google.com/" target="_blank">Google Fonts</a></small>
                                    <code>
                                        &lt;link href="<span class="text-success font-weight-bold">https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap</span>" rel="stylesheet"&gt;
                                    </code>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text_font_family">{{ __('content.text_font_family') }} </label>
                                    <input type="text" name="text_font_family" class="form-control" id="text_font_family" placeholder="'Roboto', sans-serif">
                                    <small class="form-text text-muted">{{ __('content.find_the_font_family_and_put_it_here') }}</small>
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
