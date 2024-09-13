@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.blogs') }}
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/blog-style1.jpg') }}" alt="draft image">
                            </div>
                        </h6>
                        <div>
                            <button type="button" class="btn btn-primary  mb-3 mr-2" data-toggle="modal" data-target="#blogSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <a href="{{ url('admin/blog/create') }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_blog') }}</a>
                        </div>
                    </div>

                    @if (count($blogs) > 0)
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
                            <form onsubmit="return btnCheckListGet()" action="{{ route('blog.destroy_checked') }}" method="POST">
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
                                    <th>{{ __('content.category') }}</th>
                                    <th>{{ __('content.post_date') }}</th>
                                    <th>{{ __('content.order') }}</th>
                                    <th>{{ __('content.status') }}</th>
                                    <th class="custom-width-action">{{ __('content.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $desc = count($blogs); $asc=0; @endphp
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <input  name="check_list[]" type="checkbox" value="{{ $blog->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                        </td>
                                        <td>
                                            @if (!empty($blog->section_image))
                                                <img class="image-size img-fluid" src="{{ asset('uploads/img/blog/thumbnail/'.$blog->section_image) }}" alt="blog image">
                                            @else
                                                <img class="image-size img-fluid" src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image">
                                            @endif
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td><span class="badge badge-pill badge-dark">@if (isset($blog->category->category_name)) {{ $blog->category->category_name }} @else {{ $blog->category_name }} @endif</span></td>
                                        <td>{{ Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</td>
                                        <td>{{ $blog->order }}</td>
                                        <td>
                                            @if ($blog->status == "published")
                                                <span class="badge badge-pill badge-success">{{ __('content.published') }}</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">{{ __('content.draft') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ route('blog.edit', $blog->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $blog->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="blogModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="blogModalCenterTitle">{{ __('content.delete') }}</h5>
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
                                                        <form class="d-inline-block" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
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
    <div class="modal fade" id="blogSectionModal" tabindex="-1" role="dialog" aria-labelledby="blogSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="blogSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($blog_section))
                        @if ($demo_mode == "on")
                            <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('blog-section.update', $blog_section->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_title">{{ __('content.section_title') }}</label>
                                            <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $blog_section->section_title }}">
                                            <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'section_title')">{{ __('<a href="">') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'section_title')">{{ __('<br>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'section_title')">{{ __('<b>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'section_title')">{{ __('<i>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'section_title')">{{ __('<span>') }}</span>
                                                <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'section_title')">{{ __('<p>') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }}</label>
                                            <input type="text" name="title" class="form-control" id="title" value="{{ $blog_section->title }}">
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
                                            <label for="button_name">{{ __('content.button_name') }} </label>
                                            <input id="button_name" name="button_name" type="text" class="form-control" value="{{ $blog_section->button_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_url">{{ __('content.button_url') }} </label>
                                            <input id="button_url" name="button_url" type="text" class="form-control" value="{{ $blog_section->button_url }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_item">{{ __('content.section_item') }} <span class="text-red">*</span></label>
                                            <input type="number" name="section_item" class="form-control" id="section_item" value="{{ $blog_section->section_item }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="paginate_item">{{ __('content.paginate_item') }} <span class="text-red">*</span></label>
                                            <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="{{ $blog_section->paginate_item }}" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#blogSectionDestroyModal{{ $blog_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="blogSectionDestroyModal{{ $blog_section->id }}" tabindex="-1" role="dialog" aria-labelledby="blogSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="blogSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('blog-section.destroy', $blog_section->id) }}" method="POST">
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
                                    <form action="{{ route('blog-section.store') }}" method="POST">
                                        @csrf
                                        @endif

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
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'section_title')">{{ __('<p>') }}</small>
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
                                                        <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_name">{{ __('content.button_name') }} </label>
                                                    <input id="button_name" name="button_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_url">{{ __('content.button_url') }} </label>
                                                    <input id="button_url" name="button_url" type="text" class="form-control">
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
                                                    <input type="number" name="paginate_item" class="form-control" id="paginate_item" value="12" required>
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
