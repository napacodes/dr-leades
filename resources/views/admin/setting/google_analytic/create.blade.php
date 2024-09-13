@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.google_analytic') }}</h4>
                @if (isset($google_analytic))
                    <form action="{{ route('google-analytic.update', $google_analytic->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.google_analytic') }} <span class="text-red">*</span></label>
                                    <input type="text" name="google_analytic" class="form-control" id="google_analytic" value="{{ $google_analytic->google_analytic }}" placeholder="G-8FZVTQT8A1" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#googleAnalyticDestroyModal{{ $google_analytic->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="googleAnalyticDestroyModal{{ $google_analytic->id }}" tabindex="-1" role="dialog" aria-labelledby="googleAnalyticDestroyModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="googleAnalyticDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                </div>
                                <div class="modal-footer">
                                    <form class="d-inline-block" action="{{ route('google-analytic.destroy', $google_analytic->id) }}" method="POST">
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
                    <form action="{{ route('google-analytic.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.google_analytic') }} <span class="text-red">*</span></label>
                                    <input type="text" name="google_analytic" class="form-control" id="google_analytic"  placeholder="G-8FZVTQT8A1" required>
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
