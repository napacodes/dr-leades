@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 col-sm-6 col-xl">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="text-uppercase font-14">{{ __('content.blogs') }}</h6>

                            <!-- Heading -->
                            <span class="font-24 text-dark mb-0">
                                 @if ($blogs_count == 0) 0 @else {{ $blogs_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fab fa-blogger-b font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="font-14 text-uppercase">
                                {{ __('content.page_builder') }}
                            </h6>
                            <!-- Heading -->
                            <a href="{{ url('admin/page-builder/create') }}">
                                <span class="font-24 text-dark mb-0">
                                    {{ __('content.pages') }}
                                </span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-puzzle-piece font-46 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="font-14 text-uppercase">
                                {{ __('content.color_option') }}
                            </h6>
                            <!-- Heading -->
                            <a href="{{ url('admin/color-option/create') }}">
                                <span class="font-24 text-dark">
                                    {{ __('content.show') }}
                                 </span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-palette font-46 text-red"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="font-14 text-uppercase">
                                {{ __('content.languages') }}
                            </h6>
                            <div class="row align-items-center no-gutters">
                                <div class="col-auto">
                                    <!-- Heading -->
                                    <a href="{{ url('admin/language/create') }}">
                                        <span class="font-24 text-dark mr-2">
                                            {{ __('content.show') }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-language font-46 text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- / .row -->

@endsection
