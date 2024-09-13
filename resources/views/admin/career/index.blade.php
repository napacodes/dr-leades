@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h4 class="card-title mb-0">{{ __('content.careers') }}
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('content.'.$style) }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('career.index', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                                </div>
                            </div>
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/career-'.$style.'.jpg') }}" alt="draft image">
                            </div>
                        </h4>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#careerSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <a href="{{ url('admin/career/create/'.$style) }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_career') }}</a>
                        </div>
                    </div>

                    @if (count($careers) > 0)
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('career.destroy_checked') }}" method="POST">
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
                                    <th>{{ __('content.additional_features') }}</th>
                                    <th>{{ __('content.title') }}</th>
                                    <th>{{ __('content.category_name') }}</th>
                                    <th>{{ __('content.order') }}</th>
                                    <th class="custom-width-action">{{ __('content.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $desc = count($careers); $asc=0; @endphp
                                @foreach ($careers as $career)
                                    <tr>
                                        <td>
                                            <input name="check_list[]" type="checkbox" value="{{ $career->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ __('content.select') }}</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"  href="{{ route('career-content.create', $career->id) }}">{{ __('content.career_content') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $career->title }}</td>
                                        <td>{{ $career->category_name }}</td>
                                        <td>{{ $career->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('career.edit', $career->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $career->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $career->id }}" tabindex="-1" role="dialog" aria-labelledby="counterModalCenterTitle" aria-hidden="true">
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
                                                        <form class="d-inline-block" action="{{ route('career.destroy', $career->id) }}" method="POST">
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
    <div class="modal fade" id="careerSectionModal" tabindex="-1" role="dialog" aria-labelledby="careerSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="careerSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($career_section))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('career-section.update', $career_section->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                                <input name="style" type="hidden" value="{{ $style }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_title">{{ __('content.section_title') }}</label>
                                            <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $career_section->section_title }}">
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
                                            <input type="text" name="title" class="form-control" id="title" value="{{ $career_section->title }}">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_name">{{ __('content.button_name') }}</label>
                                            <input type="text" name="button_name" class="form-control" id="button_name" value="{{ $career_section->button_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_url">{{ __('content.button_url') }}</label>
                                            <input type="text" name="button_url" class="form-control" id="button_url" value="{{ $career_section->button_url }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_title">{{ __('content.company_title') }}</label>
                                            <input type="text" name="company_title" class="form-control" id="company_title" value="{{ $career_section->company_title }}">
                                            <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'company_title')">{{ __('<a href="">') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'company_title')">{{ __('<br>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'company_title')">{{ __('<b>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'company_title')">{{ __('<i>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'company_title')">{{ __('<span>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'company_title')">{{ __('<p>') }}</span>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_description">{{ __('content.company_description') }}</label>
                                            <textarea name="company_description" class="form-control" id="company_description" rows="3">{{ $career_section->company_description }}</textarea>
                                            <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'company_description')">{{ __('<a href="">') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'company_description')">{{ __('<br>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'company_description')">{{ __('<b>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'company_description')">{{ __('<i>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'company_description')">{{ __('<span>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'company_description')">{{ __('<p>') }}</span>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_contact_title">{{ __('content.company_contact_title') }}</label>
                                            <input type="text" name="company_contact_title" class="form-control" id="company_contact_title" value="{{ $career_section->company_contact_title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">{{ __('content.email') }}</label>
                                            <input type="text" name="email" class="form-control" id="email" value="{{ $career_section->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone">{{ __('content.phone') }}</label>
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $career_section->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">{{ __('content.address') }}</label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{ $career_section->address }}">
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_item">{{ __('content.section_item') }}</label>
                                                <input type="number" name="section_item" class="form-control" id="section_item" value="{{ $career_section->section_item }}">
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="paginate_item">{{ __('content.paginate_item') }}</label>
                                            <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="{{ $career_section->paginate_item }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#careerSectionDestroyModal{{ $career_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="careerSectionDestroyModal{{ $career_section->id }}" tabindex="-1" role="dialog" aria-labelledby="careerSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="careerSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('career-section.destroy', $career_section->id) }}" method="POST">
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
                                    <form action="{{ route('career-section.store') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @endif

                                        <input name="style" type="hidden" value="{{ $style }}">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_title">{{ __('content.section_title') }}</label>
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
                                                    <label for="title">{{ __('content.title') }}</label>
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_name">{{ __('content.button_name') }}</label>
                                                    <input type="text" name="button_name" class="form-control" id="button_name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_url">{{ __('content.button_url') }}</label>
                                                    <input type="text" name="button_url" class="form-control" id="button_url">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="company_title">{{ __('content.company_title') }}</label>
                                                    <input type="text" name="company_title" class="form-control" id="company_title">
                                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'company_title')">{{ __('<a href="">') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'company_title')">{{ __('<br>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'company_title')">{{ __('<b>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'company_title')">{{ __('<i>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'company_title')">{{ __('<span>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'company_title')">{{ __('<p>') }}</span>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="company_description">{{ __('content.company_description') }}</label>
                                                    <textarea name="company_description" class="form-control" id="company_description" rows="3"></textarea>
                                                    <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'company_description')">{{ __('<a href="">') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'company_description')">{{ __('<br>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'company_description')">{{ __('<b>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'company_description')">{{ __('<i>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'company_description')">{{ __('<span>') }}</span>
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'company_description')">{{ __('<p>') }}</span>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="company_contact_title">{{ __('content.company_contact_title') }}</label>
                                                    <input type="text" name="company_contact_title" class="form-control" id="company_contact_title">
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
                                                    <label for="address">{{ __('content.address') }}</label>
                                                    <input type="text" name="address" class="form-control" id="address">
                                                </div>
                                            </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="section_item">{{ __('content.section_item') }}</label>
                                                        <input type="number" name="section_item" class="form-control" id="section_item" value="6">
                                                    </div>
                                                </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="paginate_item">{{ __('content.paginate_item') }}</label>
                                                    <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="12">
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
