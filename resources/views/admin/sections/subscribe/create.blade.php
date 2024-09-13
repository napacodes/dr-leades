@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.subscribe_section') }}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('content.'.$style) }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('subscribe-section.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                        </div>
                    </div>
                </h4>
                @if (isset($subscribe_section))
                    <form action="{{ route('subscribe-section.update', $subscribe_section->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <input name="style" type="hidden" value="{{ $style }}">

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} </label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $subscribe_section->title }}">
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#subscribeSectionDestroyModal{{ $subscribe_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="subscribeSectionDestroyModal{{ $subscribe_section->id }}" tabindex="-1" role="dialog" aria-labelledby="subscribeSectionDestroyModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="subscribeSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                </div>
                                <div class="modal-footer">
                                    <form class="d-inline-block" action="{{ route('subscribe-section.destroy', $subscribe_section->id) }}" method="POST">
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
                    <form action="{{ route('subscribe-section.store') }}" method="POST">
                        @csrf

                        <input name="style" type="hidden" value="{{ $style }}">

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} </label>
                                        <input type="text" name="title" class="form-control" id="title">
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
