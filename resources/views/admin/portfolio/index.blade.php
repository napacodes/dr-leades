@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h4 class="card-title mb-0">{{ __('content.portfolio') }}
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('content.'.$style) }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('portfolio.index', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                                </div>
                            </div>
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/portfolio-'.$style.'.jpg') }}" alt="draft image">
                            </div>
                        </h4>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#portfolioSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <a href="{{ url('admin/portfolio/create/'.$style) }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_portfolio') }}</a>
                        </div>
                    </div>

                    @if (count($portfolios) > 0)
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('portfolio.destroy_checked') }}" method="POST">
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
                                @php $desc = count($portfolios); $asc=0; @endphp
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>
                                            <input  name="check_list[]" type="checkbox" value="{{ $portfolio->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ __('content.select') }}</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"  href="{{ route('portfolio-content.create', $portfolio->id) }}">{{ __('content.portfolio_content') }}</a>
                                                    <a class="dropdown-item"  href="{{ route('portfolio-detail.create', $portfolio->id) }}">{{ __('content.portfolio_details') }}</a>
                                                    <a class="dropdown-item"  href="{{ route('portfolio-image.create', $portfolio->id) }}">{{ __('content.portfolio_images') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ $portfolio->category_name }}</td>
                                        <td>{{ $portfolio->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $portfolio->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $portfolio->id }}" tabindex="-1" role="dialog" aria-labelledby="counterModalCenterTitle" aria-hidden="true">
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
                                                        <form class="d-inline-block" action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST">
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
    <div class="modal fade" id="portfolioSectionModal" tabindex="-1" role="dialog" aria-labelledby="portfolioSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="portfolioSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($portfolio_section))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('portfolio-section.update', $portfolio_section->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                                <input name="style" type="hidden" value="{{ $style }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_title">{{ __('content.section_title') }}</label>
                                            <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $portfolio_section->section_title }}">
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
                                            <input type="text" name="title" class="form-control" id="title" value="{{ $portfolio_section->title }}">
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
                                            <input type="text" name="button_name" class="form-control" id="button_name" value="{{ $portfolio_section->button_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_url">{{ __('content.button_url') }}</label>
                                            <input type="text" name="button_url" class="form-control" id="button_url" value="{{ $portfolio_section->button_url }}">
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_item">{{ __('content.section_item') }}</label>
                                                <input type="number" name="section_item" class="form-control" id="section_item" value="{{ $portfolio_section->section_item }}">
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="paginate_item">{{ __('content.paginate_item') }}</label>
                                            <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="{{ $portfolio_section->paginate_item }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#portfolioSectionDestroyModal{{ $portfolio_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="portfolioSectionDestroyModal{{ $portfolio_section->id }}" tabindex="-1" role="dialog" aria-labelledby="portfolioSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="portfolioSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('portfolio-section.destroy', $portfolio_section->id) }}" method="POST">
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
                                    <form action="{{ route('portfolio-section.store') }}"  method="POST" enctype="multipart/form-data">
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
