@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.ready_color_option') }}</h4>
                @if (isset($color_option))
                    <form action="{{ route('color-option.update', $color_option->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="hiddenradio">
                                    <div class="">
                                        <label>
                                            <input type="radio" name="color_option" value="0" {{ ($color_option->color_option == 0)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-default mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="1" {{ ($color_option->color_option == 1)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-1 mr-2 fas fa-tint"></i>                                                </label>
                                        <label>
                                            <input type="radio" name="color_option" value="2" {{ ($color_option->color_option == 2)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-2 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="3" {{ ($color_option->color_option == 3)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-3 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="4" {{ ($color_option->color_option == 4)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-4 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="5" {{ ($color_option->color_option == 5)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-5 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="6" {{ ($color_option->color_option == 6)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-6 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="7" {{ ($color_option->color_option == 7)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-7 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="8" {{ ($color_option->color_option == 8)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-8 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="9" {{ ($color_option->color_option == 9)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-9 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="10" {{ ($color_option->color_option == 10)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-10 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="11" {{ ($color_option->color_option == 11)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-11 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="12" {{ ($color_option->color_option == 12)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-12 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="13" {{ ($color_option->color_option == 13)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-13 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="14" {{ ($color_option->color_option == 14)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-14 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="15" {{ ($color_option->color_option == 15)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-15 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="16" {{ ($color_option->color_option == 16)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-16 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="17" {{ ($color_option->color_option == 17)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-17 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="18" {{ ($color_option->color_option == 18)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-18 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="19" {{ ($color_option->color_option == 19)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-19 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="20" {{ ($color_option->color_option == 20)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-20 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="21" {{ ($color_option->color_option == 21)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-21 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="22" {{ ($color_option->color_option == 22)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-22 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="23" {{ ($color_option->color_option == 23)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-23 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="24" {{ ($color_option->color_option == 24)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-24 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="25" {{ ($color_option->color_option == 25)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-25 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="26" {{ ($color_option->color_option == 26)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-26 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="27" {{ ($color_option->color_option == 27)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-27 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="28" {{ ($color_option->color_option == 28)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-28 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="29" {{ ($color_option->color_option == 29)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-29 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="30" {{ ($color_option->color_option == 30)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-30 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="31" {{ ($color_option->color_option == 31)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-31 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="32" {{ ($color_option->color_option == 32)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-32 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="33" {{ ($color_option->color_option == 33)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-33 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="34" {{ ($color_option->color_option == 34)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-34 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="35" {{ ($color_option->color_option == 35)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-35 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="36" {{ ($color_option->color_option == 36)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-36 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="37" {{ ($color_option->color_option == 37)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-37 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="38" {{ ($color_option->color_option == 38)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-38 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="39" {{ ($color_option->color_option == 39)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-39 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="40" {{ ($color_option->color_option == 40)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-40 mr-2 fas fa-tint"></i>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2 mt-3">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('color-option.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="hiddenradio">
                                    <div class="">
                                        <label>
                                            <input type="radio" name="color_option" value="0">
                                            <i class="custom-font-size custom-color-default mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="1">
                                            <i class="custom-font-size custom-color-1 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="2">
                                            <i class="custom-font-size custom-color-2 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="3">
                                            <i class="custom-font-size custom-color-3 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="4">
                                            <i class="custom-font-size custom-color-4 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="5">
                                            <i class="custom-font-size custom-color-5 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="6">
                                            <i class="custom-font-size custom-color-6 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="7">
                                            <i class="custom-font-size custom-color-7 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="8">
                                            <i class="custom-font-size custom-color-8 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="9">
                                            <i class="custom-font-size custom-color-9 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="10">
                                            <i class="custom-font-size custom-color-10 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="11">
                                            <i class="custom-font-size custom-color-11 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="12">
                                            <i class="custom-font-size custom-color-12 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="13">
                                            <i class="custom-font-size custom-color-13 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="14">
                                            <i class="custom-font-size custom-color-14 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="15">
                                            <i class="custom-font-size custom-color-15 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="16">
                                            <i class="custom-font-size custom-color-16 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="17">
                                            <i class="custom-font-size custom-color-17 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="18">
                                            <i class="custom-font-size custom-color-18 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="19">
                                            <i class="custom-font-size custom-color-19 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="20">
                                            <i class="custom-font-size custom-color-20 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="21">
                                            <i class="custom-font-size custom-color-21 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="22">
                                            <i class="custom-font-size custom-color-22 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="23">
                                            <i class="custom-font-size custom-color-23 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="24">
                                            <i class="custom-font-size custom-color-24 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="25">
                                            <i class="custom-font-size custom-color-25 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="26">
                                            <i class="custom-font-size custom-color-26 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="27">
                                            <i class="custom-font-size custom-color-27 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="28">
                                            <i class="custom-font-size custom-color-28 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="29">
                                            <i class="custom-font-size custom-color-29 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="30">
                                            <i class="custom-font-size custom-color-30 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="31">
                                            <i class="custom-font-size custom-color-31 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="32">
                                            <i class="custom-font-size custom-color-32 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="33">
                                            <i class="custom-font-size custom-color-33 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="34">
                                            <i class="custom-font-size custom-color-34 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="35">
                                            <i class="custom-font-size custom-color-35 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="36">
                                            <i class="custom-font-size custom-color-36 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="37">
                                            <i class="custom-font-size custom-color-37 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="38">
                                            <i class="custom-font-size custom-color-38 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="39">
                                            <i class="custom-font-size custom-color-39 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="40">
                                            <i class="custom-font-size custom-color-40 fas fa-tint"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2 mt-3">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
                <h4 class="card-title mt-5">{{ __('content.customize_color') }}</h4>
                @if (isset($color_option))
                    <form action="{{ route('color-option.update', $color_option->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="color_option" value="41">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_color">{{ __('content.main_color') }}</label>
                                    <input id="main_color" type="color"  name="main_color" value="{{ $color_option->main_color }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="secondary_color">{{ __('content.secondary_color') }}</label>
                                    <input id="secondary_color" type="color"  name="secondary_color" value="{{ $color_option->secondary_color }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="scroll_button_color">{{ __('content.scroll_button_color') }}</label>
                                    <input id="scroll_button_color" type="color"  name="scroll_button_color" value="{{ $color_option->scroll_button_color }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_button_color">{{ __('content.bottom_button_color') }}</label>
                                    <input id="bottom_button_color" type="color"  name="bottom_button_color" value="{{ $color_option->bottom_button_color }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_button_hover_color">{{ __('content.bottom_button_hover_color') }}</label>
                                    <input id="bottom_button_hover_color" type="color"  name="bottom_button_hover_color" value="{{ $color_option->bottom_button_hover_color }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="side_button_color">{{ __('content.side_button_color') }}</label>
                                    <input id="side_button_color" type="color"  name="side_button_color" value="{{ $color_option->side_button_color }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2 mt-3">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ route('color-option.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="color_option" value="41">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_color">{{ __('content.main_color') }}</label>
                                    <input id="main_color" type="color"  name="main_color" value="#ff4500">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="secondary_color">{{ __('content.secondary_color') }}</label>
                                    <input id="secondary_color" type="color"  name="secondary_color" value="#171718">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="scroll_button_color">{{ __('content.scroll_button_color') }}</label>
                                    <input id="scroll_button_color" type="color"  name="scroll_button_color" value="#00baa3">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_button_color">{{ __('content.bottom_button_color') }}</label>
                                    <input id="bottom_button_color" type="color"  name="bottom_button_color" value="#212529">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_button_hover_color">{{ __('content.bottom_button_hover_color') }}</label>
                                    <input id="bottom_button_hover_color" type="color"  name="bottom_button_hover_color" value="#333333">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="side_button_color">{{ __('content.side_button_color') }}</label>
                                    <input id="side_button_color" type="color"  name="side_button_color" value="#25d366">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2 mt-3">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
