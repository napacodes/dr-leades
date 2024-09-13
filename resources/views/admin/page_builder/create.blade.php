@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.pages') }}</h6>
                        <div>
                           <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#pageBuilderModal">+ {{ __('content.add_page') }}</button>
                        </div>
                        </div>
                    @if (count($page_builders) > 0)
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('page-builder.destroy_checked') }}" method="POST">
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
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.page_uri') }}</th>
                                <th>{{ __('content.page_name') }}</th>
                                <th>{{ __('content.is_default') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($page_builders as $page_name => $pagesWithSamePageName)
                            @foreach ($pagesWithSamePageName as $page)
                                @if ($page->page_name != 'blog-search-index')
                                <tr>
                                    <td>
                                        @if($page->is_default != 'yes')
                                        <input name="check_list[]" type="checkbox" value="{{ $page->id }}" onclick="showHideDeleteButton2(this)">
                                        @else
                                            <span class="d-none">.</span>
                                        @endif
                                    </td>
                                    <td>{{ $page->page_uri }}</td>
                                    <td>{{ $page->page_name }}</td>
                                    <td>
                                        @if($page->is_default == 'no')
                                            <span class="badge badge-danger">{{ __('content.custom_page') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('content.default_page') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $page->order }}</td>
                                    <td>
                                        @if($page->status == 0)
                                            <span class="badge badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('page-builder.edit', $page->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            @if($page->is_default != 'yes')
                                                <a href="#" data-toggle="modal" data-target="#deleteModel{{ $page->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                @if($page->is_default != 'yes')
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModel{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <form class="d-inline-block" action="{{ route('page-builder.destroy', $page->id) }}" method="POST">
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
                                @endif

                                @endif

                            @endforeach
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
    <div class="modal fade" id="pageBuilderModal" tabindex="-1" role="dialog" aria-labelledby="pageBuilderModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="pageBuilderModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('page-builder.store') }}" method="POST">
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="page_name">{{ __('content.page_names') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="page_name_id" id="page_name" required>
                                        @foreach($page_names as $page_name)
                                            @if ($page_name->page_name != 'blog-search-index')
                                                <option value="{{$page_name->id}}" data-segment-count="{{$page_name->segment_count}}">{{$page_name->page_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="page_uri">{{ __('content.page_uri') }} <span class="text-red">*</span></label>
                                    <input type="text" name="page_uri" class="form-control" id="page_uri" required>
                                    <div  class="form-text" id="selectedSegmentCountDiv"></div>
                                    <small class="form-text">example: 1 segment usage -> about</small>
                                    <small class="form-text">example: 2 segment usage -> service/detail</small>
                                    <small class="form-text">{{ __('content.please_base_on_the_count_of_segments') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
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
