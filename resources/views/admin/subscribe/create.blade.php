@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.subscribers') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subscriberModal">+ {{ __('content.add_subscriber') }}</button>
                        </div>
                    </div>
                    @if (count($subscribers) > 0)
                       <table id="basic-datatable" class="basic-datatable table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.email') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $desc = count($subscribers); $asc=0; @endphp
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>
                                         <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                    </td>

                                    <td><a href="mailto:{{ $subscriber->email }}">{{ $subscriber->email }}</a></td>
                                    <td>
                                        <div>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $subscriber->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $subscriber->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                            </div>
                                            <div class="modal-footer">
                                                <form class="d-inline-block" action="{{ route('subscribe.destroy', $subscriber->id) }}" method="POST">
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

    <!-- Modal -->
    <div class="modal fade" id="subscriberModal" tabindex="-1" role="dialog" aria-labelledby="subscriberModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="subscriberModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subscribe.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">{{ __('content.email') }} <span class="text-red">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email" required>
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
