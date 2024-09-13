@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.faqs') }}
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('content.'.$style) }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('faq.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                                    <a class="dropdown-item" href="{{ route('faq.create', ['style' => 'style2']) }}">{{ __('content.style2') }}</a>
                                </div>
                            </div>
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/faq-'.$style.'.jpg') }}" alt="draft image">
                            </div>
                        </h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#faqSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#faqModal">+ {{ __('content.add_faq') }}</button>
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('faq.destroy_checked') }}" method="POST">
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
                                    <th>{{ __('content.question') }}</th>
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
                                        <td>{{ $item->question }}</td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('faq.edit', $item->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="faqModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="faqModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <form class="d-inline-block" action="{{ route('faq.destroy', $item->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
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
    <div class="modal fade" id="faqSectionModal" tabindex="-1" role="dialog" aria-labelledby="faqSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="faqSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($item_section))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('faq-section.update', $item_section->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                                <input type="hidden" name="style" value="{{ $style }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_title">{{ __('content.section_title') }} </label>
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
                                            <label for="title">{{ __('content.title') }} </label>
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
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#faqSectionDestroyModal{{ $item_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="faqSectionDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="faqSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="faqSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('faq-section.destroy', $item_section->id) }}" method="POST">
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
                                    <form action="{{ route('faq-section.store') }}"  method="POST" enctype="multipart/form-data">
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
    <div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="faqModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="style" value="{{ $style }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question">{{ __('content.question') }}</label>
                                    <input type="text" name="question" class="form-control" id="question">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="answer">{{ __('content.answer') }}</label>
                                    <textarea name="answer" class="form-control" id="answer" rows="3"></textarea>
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
