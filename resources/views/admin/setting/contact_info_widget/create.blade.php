@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.contact_info_widget') }}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('content.'.$style) }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('contact-info-widget.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                        </div>
                    </div>
                </h4>
            @if (isset($contact_info_widget))
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('contact-info-widget.update', $contact_info_widget->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $contact_info_widget->title }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }}</label>
                                        <input type="text" name="description" class="form-control" id="description" value="{{ $contact_info_widget->description }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">{{ __('content.address') }}</label>
                                        <input type="text" name="address" class="form-control" id="address" value="{{ $contact_info_widget->address }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">{{ __('content.email') }}</label>
                                        <input type="text" name="email" class="form-control" id="email" value="{{ $contact_info_widget->email }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone">{{ __('content.phone') }}</label>
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $contact_info_widget->phone }}">
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="working_hour">{{ __('content.working_hour') }}</label>
                                        <input type="text" name="working_hour" class="form-control" id="working_hour" value="{{ $contact_info_widget->working_hour }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoWidgetDestroyModal{{ $contact_info_widget->id }}">
                                        <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="contactInfoWidgetDestroyModal{{ $contact_info_widget->id }}" tabindex="-1" role="dialog" aria-labelledby="contactInfoWidgetDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="contactInfoWidgetDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('contact-info-widget.destroy', $contact_info_widget->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                            @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('contact-info-widget.store') }}" method="POST">
                                    @csrf
                                    @endif

                                    <input name="style" type="hidden" value="{{ $style }}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('content.title') }}</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">{{ __('content.description') }}</label>
                                                <input type="text" name="description" class="form-control" id="description">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">{{ __('content.address') }}</label>
                                                <input type="text" name="address" class="form-control" id="address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">{{ __('content.email') }}</label>
                                                <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">{{ __('content.phone') }}</label>
                                                    <input type="text" name="phone" class="form-control" id="phone">
                                                </div>
                                            </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="working_hour">{{ __('content.working_hour') }}</label>
                                                <input type="text" name="working_hour" class="form-control" id="working_hour">
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
