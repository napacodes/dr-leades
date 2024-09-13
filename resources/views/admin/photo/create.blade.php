@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.add_photo') }}</h6>
                    </div>
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gallery_image">{{ __('content.image') }} (.svg, .jpg, .jpeg, .png, .webp, gif) <span class="text-red">*</span></label>
                                        <input type="file" name="gallery_image" class="form-control-file" id="gallery_image" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="0" required>
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
    </div>
    <!-- end row -->

    <!-- Sliders row -->
    @if (count($galleries) > 0)
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('content.photos') }}</h5>
                        <div class="row text-center">
                            @foreach ($galleries as $gallery)
                                <div class="col-sm-6 col-xl-3 mb-4">
                                    <a href="{{ asset('uploads/img/photo/'.$gallery->gallery_image) }}" data-lightbox="example-set">
                                        <img src="{{ asset('uploads/img/photo/'.$gallery->gallery_image) }}" class="img-fluid mb-30" alt="gallery image">
                                    </a>
                                    <div>
                                        <div>
                                            <div class="form-group">
                                                <input  type="text" value="{{ url('/'.'uploads/img/photo/'.$gallery->gallery_image) }}" id="copyImageLink{{ $gallery->id }}">
                                                <button class="btn btn-success mt-3" onclick="copyImageLink({{ $gallery->id }})">{{ __('Copy Image Link') }}</button>
                                            </div>
                                        </div>
                                        <a href="{{ route('photo.edit', $gallery->id) }}" class="mr-2">
                                            <i class="fa fa-edit text-info font-18"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModel{{ $gallery->id }}">
                                            <i class="fa fa-trash text-danger font-18"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModel{{ $gallery->id }}" tabindex="-1" role="dialog">
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
                                                            <form class="d-inline-block" action="{{ route('photo.destroy', $gallery->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                @endif

                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $galleries->links() }}
            </div>
        </div>
    @endif
    <!-- end row -->

@endsection
