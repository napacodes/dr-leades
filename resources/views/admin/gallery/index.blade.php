@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.gallery') }}
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/gallery-style1.jpg') }}" alt="draft image">
                            </div>
                        </h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#galleryImageSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <a href="{{ route('gallery.create') }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_gallery') }}</a>
                        </div>
                    </div>

                    @if (count($items) > 0)
                        <div>
                            <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                            <label for="check_all">{{ __('content.all') }}</label>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('gallery.destroy_checked') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                @endif

                            <input type="hidden" id="checked_lists" name="checked_lists" value="">

                            <!-- Modal -->
                            <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteCheckedModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.delete_selected') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.image') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.subtitle') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $desc = count($items); $asc=0; @endphp
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $item->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                    </td>
                                    <td>
                                        @if (!empty($item->section_image))
                                            <img class="image-size img-fluid" src="{{ asset('uploads/img/gallery/'.$item->section_image) }}" alt="blog image">
                                        @else
                                            <img class="image-size img-fluid" src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image">
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->subtitle }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('gallery.edit', $item->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="counterModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="counterModalCenterTitle">{{ __('content.delete') }}</h5>
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
                                                    <form class="d-inline-block" action="{{ route('gallery.destroy', $item->id) }}" method="POST">
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

    <div class="modal fade" id="galleryImageSectionModal" tabindex="-1" role="dialog" aria-labelledby="galleryImageSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="galleryImageSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($item_section))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('gallery-section.update', $item_section->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $item_section->title }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }}</label>
                                        <textarea name="description" class="form-control" id="description" rows="3">{{ $item_section->description }}</textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_item">{{ __('content.section_item') }} <span class="text-red">*</span></label>
                                        <input type="number" name="section_item" class="form-control" id="section_item" value="{{ $item_section->section_item }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="paginate_item">{{ __('content.paginate_item') }} <span class="text-red">*</span></label>
                                        <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="{{ $item_section->paginate_item }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mr-2">{{ __('content.submit') }}</button>
                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#galleryImageSectionDestroyModal{{ $item_section->id }}">
                                        <i class="fa fa-trash"></i> Reset
                                    </a>
                        </form>

                            <!-- Modal -->
                            <div class="modal fade" id="galleryImageSectionDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="serviceSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="galleryImageSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('gallery-section.destroy', $item_section->id) }}" method="POST">
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
                                        <form action="{{ route('gallery-section.store') }}"  method="POST">
                                            @csrf
                                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }}</label>
                                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_item">{{ __('content.section_item') }} <span class="text-red">*</span></label>
                                        <input type="number" name="section_item" class="form-control" id="section_item" value="3" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="paginate_item">{{ __('content.paginate_item') }} <span class="text-red">*</span></label>
                                        <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="6" required>
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
                    @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
