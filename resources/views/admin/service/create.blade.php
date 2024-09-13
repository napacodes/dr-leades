@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_service') }}
                    <!-- Button -->
                    <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                    <!-- Modal -->
                    <div id="imageModal" class="border border-success iyzi-modal">
                        <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/service-'.$style.'.jpg') }}" alt="draft image">
                    </div>
                </h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <input name="style" type="hidden" value="{{ $style }}">

                        <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                          <input id="title" name="title" type="text" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group form-group-default">
                                          <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                          <select  class="form-control" name="category_id" id="category" required>
                                              @foreach($categories as $category)
                                                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="short_description">{{ __('content.short_description') }}</label>
                                          <textarea id="short_description" name="short_description" class="form-control" rows="3"></textarea>
                                      </div>
                                  </div>
                            <div class="col-md-12">
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
                                        <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 64 x 64 (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                        <input type="file" name="section_image" class="form-control-file" id="section_image">
                                        <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="section_image_2">{{ __('content.thumbnail') }} ({{ __('content.size') }} 600 x 600) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                          <input id="section_image_2" name="section_image_2" type="file" class="form-control-file">
                                          <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="button_name">{{ __('content.button_name') }} </label>
                                          <input id="button_name" name="button_name" type="text" class="form-control">
                                          <small class="form-text text-muted">{{ __('content.when_you_leave_this_section_blank_it_will_go_to_its_own_detail_page') }}</small>
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
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                      </div>
                                  </div>
                              </div>

                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
