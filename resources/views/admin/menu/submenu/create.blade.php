@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.submenus') }}</h6>
                        <div>
                           <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#submenuModal">+ {{ __('content.add_submenu') }}</button>
                        </div>
                        </div>
                    @if (count($submenus) > 0)
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('submenu.destroy_checked') }}" method="POST">
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
                                <th>{{ __('content.submenu_name') }}</th>
                                <th>{{ __('content.menu') }}</th>
                                <th>{{ __('content.uri') }}</th>
                                <th>{{ __('content.url') }}</th>
                                <th>{{ __('content.view') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $desc = count($submenus); $asc=0; @endphp
                            @foreach ($submenus as $submenu)
                                    <tr>
                                        <td>
                                            <input  name="check_list[]" type="checkbox" value="{{ $submenu->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                        </td>
                                        <td>{{ $submenu->submenu_name }}</td>
                                        <td><span class="badge badge-pill badge-dark">@if (isset($submenu->menu->menu_name)) {{ $submenu->menu->menu_name }} @else {{ $submenu->menu_name }} @endif</span></td>
                                        <td>{{ $submenu->uri }}</td>
                                        <td>{{ $submenu->url }}</td>
                                        <td>{{ $submenu->view }}</td>
                                        <td>
                                            @if ($submenu->status == "published")
                                                <span class="badge badge-pill badge-success">{{ __('content.published') }}</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">{{ __('content.draft') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $submenu->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('submenu.edit', $submenu->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModel{{ $submenu->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModel{{ $submenu->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <form class="d-inline-block" action="{{ route('submenu.destroy', $submenu->id) }}" method="POST">
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
    <div class="modal fade" id="submenuModal" tabindex="-1" role="dialog" aria-labelledby="submenuModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="submenuModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('submenu.store') }}" method="POST">
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="menu">{{ __('content.menus') }} <span class="text-red">*</span></label>
                                    <select  class="form-control" name="menu_id" id="menu" required>
                                        @foreach($menus as $menu)
                                            <option value="{{$menu->id}}">{{$menu->menu_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="submenu_name">{{ __('content.submenu_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="submenu_name" class="form-control" id="submenu_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="uri">{{ __('content.pages_within_the_site') }} </label>
                                    <select  class="form-control" name="uri" id="uri">
                                        <option value="">{{ __('content.empty') }}</option>
                                        @foreach ($pages as $page)
                                            @if ($page->page_name != 'blog-search-index')
                                            <option value="{{$page->page_uri}}">{{$page->page_uri}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">{{ __('content.to_use_the_url_enter_empty_in_this_field') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">{{ __('content.url') }}</label>
                                    <input type="text" name="url" class="form-control" id="url">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="published">{{ __('content.published') }}</option>
                                        <option value="draft">{{ __('content.draft') }}</option>
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
