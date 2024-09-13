@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.for_frontend') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#frontendKeywordModal">+ {{ __('content.add_keyword') }}</button>
                        </div>
                    </div>
                    @if (isset($frontend_keywords))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('frontend-keyword.update_frontend_keyword') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @endif

                            <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                            <div class="row">
                                @foreach ($frontend_keywords as $frontend_keyword)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="{{ $frontend_keyword->id }}" title="{{ $frontend_keyword->key }}">{{ $frontend_keyword->value }} </label>
                                            <input type="text" name="value[{{ $frontend_keyword->id }}]" class="form-control" id="{{ $frontend_keyword->id }}" placeholder="{{ $frontend_keyword->key }}" value="{{ $frontend_keyword->value }}">
                                        </div>

                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->

    <!-- Modal -->
    <div class="modal fade" id="frontendKeywordModal" tabindex="-1" role="dialog" aria-labelledby="frontendKeywordModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="frontendKeywordModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('frontend-keyword.store_frontend_keyword') }}" method="POST">
                            @csrf
                            @endif

                        <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="key">Key <span class="text-red">*</span></label>
                                    <input type="text" name="key" class="form-control" id="key" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="value">Value <span class="text-red">*</span></label>
                                    <input type="text" name="value" class="form-control" id="value" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">Please do not use this part unnecessarily. If the developer has forgotten to add a keyword,
                                        you can add it yourself here. If you see a keyword like the one below on your site,
                                        please get it and create it here. For example, the developer forget to enter the word "Your Comment".
                                        In this panel, it will look like this: "content.your_comment" may appear as "frontend.your_comment" on frontend. To create this word, please take only the "your_comment" part from these expressions.
                                        It is necessary to create this key. It is recommended to enter Value as "Your Comment".
                                        <br>
                                        Example use:
                                        <br>
                                        Key: your_comment <br>
                                        Value: Your Comment
                                    </small>
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