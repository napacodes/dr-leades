@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_faq') }}
                        <!-- Button -->
                        <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                        <!-- Modal -->
                        <div id="imageModal" class="border border-success iyzi-modal">
                            <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/faq-'.$item->style.'.jpg') }}" alt="draft image">
                        </div>
                    </h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
                    <form action="{{ route('faq.update', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="style" value="{{ $item->style }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question">{{ __('content.question') }} </label>
                                    <input type="text" name="question" class="form-control" id="question" value="{{ $item->question }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="answer">{{ __('content.answer') }}</label>
                                    <textarea type="text" name="answer" class="form-control" id="answer" rows="3">{{ $item->answer }}</textarea>
                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'answer')">{{ __('<a href="">') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'answer')">{{ __('<br>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'answer')">{{ __('<b>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'answer')">{{ __('<i>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'answer')">{{ __('<span>') }}</span>
                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'answer')">{{ __('<p>') }}</span>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $item->order }}" required>
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
