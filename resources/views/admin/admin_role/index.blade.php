@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.admin_manage') }}</h6>
                        <div>
                            <a href="{{ url('admin/admin-role/create') }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_admin_role') }}</a>
                        </div>
                    </div>

                    @if (count($roles) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.role_name') }}</th>
                                <th>{{ __('content.permissions') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @php  $role_permissions = $role->getAllPermissions(); @endphp
                                        @if ($role->name == 'super-admin')
                                            <span class="badge badge-success m-1">{{ __('content.has_all_permissions') }}</span>
                                        @else
                                            @foreach ($role_permissions as $role_permission)
                                                <span class="badge badge-success m-1">{{ $role_permission->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                           @if ($role->name != 'super-admin')
                                                <a href="{{ route('admin-role.edit', $role->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $role->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <form class="d-inline-block" action="{{ route('admin-role.destroy', $role->id) }}" method="POST">
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

@endsection