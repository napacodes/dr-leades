@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.languages') }}</h6>
                    </div>
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('language.update_language') }}" method="POST">
                            @method('PATCH')
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_id">{{ __('content.default_site_language') }}</label>
                                    <select class="form-control" name="language_id" id="language_id" required>
                                        @foreach ($languages as $lang)
                                            <option value="{{ $lang->id }}" {{ $lang->default_site_language == 1 ? 'selected' : '' }}>{{ $lang->language_name }}</option>
                                        @endforeach
                                            @php unset($lang); @endphp
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('content.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.languages') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#languageModal">+ {{ __('content.add_language') }}</button>
                        </div>
                    </div>

                    @if (count($languages) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.language_name') }}</th>
                                <th>{{ __('content.language_code') }}</th>
                                <th>{{ __('content.direction') }}</th>
                                <th>{{ __('content.keywords') }}</th>
                                <th>{{ __('content.display_dropdown') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($languages as $language)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $language->language_name }}</td>
                                    <td>{{ $language->language_code }}</td>
                                    <td>
                                        @if ($language->direction == 0)
                                            <span class="badge badge-pill badge-success-lighten">{{ __('ltr') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('rtl') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/language-keyword-for-adminpanel/create/'. $language->id) }}" class="btn btn-primary">{{ __('content.for_admin_panel') }}</a>
                                        <a href="{{ url('admin/language-keyword-for-frontend/frontend-create/'. $language->id) }}"  class="btn btn-primary">{{ __('content.for_frontend') }}</a>
                                    </td>
                                    <td>
                                    @if ($demo_mode == "on")
                                        <!-- Include Alert Blade -->
                                            @include('admin.demo_mode.demo-mode')
                                        @else
                                            <form action="{{ route('language.update_display_dropdown', $language->id) }}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                @endif

                                            @if ($language->display_dropdown == 1)
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('content.hide') }}
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('content.show') }}
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('language.edit', $language->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            @if ($language->id != 1)

                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $language->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>

                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $language->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="languageModalCenterTitle">{{ __('content.delete') }}</h5>
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
                                                    <form class="d-inline-block" action="{{ route('language.destroy', $language->id) }}" method="POST">
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
                            @php unset($language); @endphp
                            </tbody>
                        </table>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
    <div class="modal fade" id="languageModal" tabindex="-1" role="dialog" aria-labelledby="languageModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="languageModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('language.store') }}" method="POST">
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_name">{{ __('content.language_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="language_name" class="form-control" id="language_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_code">{{ __('content.language_code') }} <span class="text-red">*</span></label>
                                    <input type="text" name="language_code" class="form-control" id="language_code" required>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="direction" class="col-form-label">{{ __('content.direction') }} </label>
                                    <select class="form-control" name="direction" id="direction">
                                        <option value="0" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="0">{{ __('ltr') }}</option>
                                        <option value="1">{{ __('rtl') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="display_dropdown" class="col-form-label">{{ __('content.display_dropdown') }} </label>
                                    <select class="form-control" name="display_dropdown" id="display_dropdown">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.show') }}</option>
                                        <option value="0">{{ __('content.hide') }}</option>
                                    </select>
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