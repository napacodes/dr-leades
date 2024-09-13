@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h4 class="card-title mb-0">{{ __('content.contact_info') }}
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('content.'.$style) }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('contact-info.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                                </div>
                            </div>
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/contact-'.$style.'.jpg') }}" alt="draft image">
                            </div>
                        </h4>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#contactInfoSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#contactInfoModal">+ {{ __('content.add_contact_info') }}</button>
                        </div>
                    </div>
                    @if (count($items) > 0)
                        <div class="mr-3">
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('feature.destroy_checked') }}" method="POST">
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
                                    <th>{{ __('content.title') }}</th>
                                    <th>{{ __('content.description') }}</th>
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
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('contact-info.edit', $item->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="contactInfoModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="contactInfoModalCenterTitle">{{ __('content.delete') }}</h5>
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
                                                        <form class="d-inline-block" action="{{ route('contact-info.destroy', $item->id) }}" method="POST">
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
    <div class="modal fade" id="contactInfoSectionModal" tabindex="-1" role="dialog" aria-labelledby="contactInfoSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="contactInfoSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($item_section))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('contact-info-section.update', $item_section->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                                <input type="hidden" name="style" value="{{ $style }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_title">{{ __('content.section_title') }}</label>
                                            <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $item_section->section_title }}">
                                            <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'section_title')">{{ __('<a href="">') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'section_title')">{{ __('<br>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'section_title')">{{ __('<b>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'section_title')">{{ __('<i>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'section_title')">{{ __('<span>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'section_title')">{{ __('<p>') }}</span>
                                            </small>
                                        </div>
                                    </div>
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
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#contactInfoSectionDestroyModal{{ $item_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="contactInfoSectionDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="contactInfoSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="contactInfoSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('contact-info-section.destroy', $item_section->id) }}" method="POST">
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
                                    <form action="{{ route('contact-info-section.store') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @endif

                                        <input type="hidden" name="style" value="{{ $style }}">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_title">{{ __('content.section_title') }} </label>
                                                    <input type="text" name="section_title" class="form-control" id="section_title">
                                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'section_title')">{{ __('<a href="">') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'section_title')">{{ __('<br>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'section_title')">{{ __('<b>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'section_title')">{{ __('<i>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'section_title')">{{ __('<span>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'section_title')">{{ __('<p>') }}</span>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title">{{ __('content.title') }} </label>
                                                    <input type="text" name="title" class="form-control" id="title">
                                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</span>
                                                    </small>
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
    <div class="modal fade" id="contactInfoModal" tabindex="-1" role="dialog" aria-labelledby="contactInfoModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="contactInfoModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('contact-info.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @endif

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-clint-area-content">
                                        <fieldset class="form-group">
                                            <legend class="font-14">{{ __('content.type') }}</legend>
                                            <div class="form-check pl-0 mb-2">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" checked=""><span class="ml-3">{{ __('content.icon') }}</span>
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check pl-0">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image"><span class="ml-3">{{ __('content.image') }}</span>
                                                    <i class="input-helper"></i></label>
                                            </div>
                                        </fieldset>
                                        <div class="form-group" id="icon-type">
                                            <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                            <div class="btn-group">
                                                <input type="hidden" name="icon" class="form-control" id="icon">
                                                <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="iconpicker-component"></i></button>
                                                <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                        </div>
                                        <div id="image-type" style="display: none;">
                                            <div class="form-group" >
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 64 x 64 (.svg, .jpg, .jpeg, .png, .webp)</label>
                                                <input type="file" name="section_image" class="form-control-file" id="section_image">
                                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title_2">{{ __('content.title') }} </label>
                                        <input type="text" name="title" class="form-control" id="title_2">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title_2')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title_2')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title_2')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title_2')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title_2')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title_2')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description_2">{{ __('content.description') }} </label>
                                        <textarea name="description" class="form-control" id="description_2" rows="3"></textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description_2')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description_2')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description_2')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description_2')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description_2')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description_2')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="0" required>
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
