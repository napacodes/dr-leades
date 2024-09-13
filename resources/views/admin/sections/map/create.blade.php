@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.map') }}</h4>
                @if (isset($map))
                    <form action="{{ route('map.update', $map->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="map_iframe" data-toggle="tooltip" title="{{ __('content.map_iframe_desc_placeholder') }}">{{ __('content.map_iframe') }}</label>
                                    <textarea name="map_iframe" class="form-control" id="map_iframe" rows="3">{{ $map->map_iframe }}</textarea>
                                    <small class="form-text text-muted">{{ __('content.map_iframe_desc_placeholder') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>

                @else
                    <form action="{{ route('map.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="map_iframe" data-toggle="tooltip" title="{{ __('content.map_iframe_desc_placeholder') }}">{{ __('content.map_iframe') }}</label>
                                    <textarea name="map_iframe" class="form-control" id="map_iframe" rows="3"></textarea>
                                    <small class="form-text text-muted">{{ __('content.map_iframe_desc_placeholder') }}</small>
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
