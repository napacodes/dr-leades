<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ColorOption;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorOptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $color_option = ColorOption::first();

        return view('admin.setting.color_option.create', compact('favicon', 'panel_image','color_option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Variables
        $main_color = null;
        $secondary_color = null;
        $scroll_button_color = null;
        $bottom_button_color = null;
        $bottom_button_hover_color = null;
        $side_button_color = null;

        // Form validation
        $validator = Validator::make($request->all(), [
            'color_option' => 'required|in:0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41',
            ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($input['color_option'] == 0) {
            // Default color
            $main_color = '#ff4500';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 1) {
            $main_color = '#0652DD';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 2) {
            $main_color = '#f72b1c';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 3) {
            $main_color = '#F79F1F';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 4) {
            $main_color = '#6ab04c';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 5) {
            $main_color = '#FC427B';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 6) {
            $main_color = '#01a3a4';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 7) {
            $main_color = '#B33771';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 8) {
            $main_color = '#2e86de';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 9) {
            $main_color = '#ff7500';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 10) {
            $main_color = '#6F1E51';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 11) {
            $main_color = '#ff793f';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 12) {
            $main_color = '#ff5100';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 13) {
            $main_color = '#0b1315';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 14) {
            $main_color = '#ff4e59';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 15) {
            $main_color = '#7f2fb2';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 16) {
            $main_color = '#dd0733';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 17) {
            $main_color = '#4baf47';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 18) {
            $main_color = '#06be94';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 19) {
            $main_color = '#c98568';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 20) {
            $main_color = '#f50386';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 21) {
            $main_color = '#644222';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 22) {
            $main_color = '#f34100';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 23) {
            $main_color = '#232323';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 24) {
            $main_color = '#f25334';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 25) {
            $main_color = '#ea1826';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 26) {
            $main_color = '#214be0';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 27) {
            $main_color = '#f1a82a';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 28) {
            $main_color = '#9f974f';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 29) {
            $main_color = '#00cde5';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 30) {
            $main_color = '#1765e5';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 31) {
            $main_color = '#ff6b6b';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 32) {
            $main_color = '#fd5523';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 33) {
            $main_color = '#fd235c';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 34) {
            $main_color = '#282828';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 35) {
            $main_color = '#af3512';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 36) {
            $main_color = '#ffb237';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 37) {
            $main_color = '#21aee0';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 38) {
            $main_color = '#45b29d';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 39) {
            $main_color = '#307bc4';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 40) {
            $main_color = '#f7af21';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 41) {
            // customize color
            $main_color = $input['main_color'];
            $secondary_color = $input['secondary_color'];
            $scroll_button_color = $input['scroll_button_color'];
            $bottom_button_color = $input['bottom_button_color'];
            $bottom_button_hover_color = $input['bottom_button_hover_color'];
            $side_button_color = $input['side_button_color'];
        }

        // Record to database
        ColorOption::firstOrCreate([
            'color_option' => $input['color_option'],
            'main_color' => $main_color,
            'secondary_color' => $secondary_color,
            'scroll_button_color' => $scroll_button_color,
            'bottom_button_color' => $bottom_button_color,
            'bottom_button_hover_color' => $bottom_button_hover_color,
            'side_button_color' => $side_button_color,
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('color-option.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Variables
        $main_color = null;
        $secondary_color = null;
        $tertiary_color = null;
        $scroll_button_color = null;
        $bottom_button_color = null;
        $bottom_button_hover_color = null;
        $side_button_color = null;


        // Form validation
        $validator = Validator::make($request->all(), [
            'color_option' => 'required|in:0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($input['color_option'] == 0) {
            $main_color = '#ff4500';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 1) {
            $main_color = '#0652DD';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 2) {
            $main_color = '#f72b1c';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 3) {
            $main_color = '#F79F1F';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 4) {
            $main_color = '#6ab04c';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 5) {
            $main_color = '#FC427B';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 6) {
            $main_color = '#01a3a4';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 7) {
            $main_color = '#B33771';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 8) {
            $main_color = '#2e86de';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 9) {
            $main_color = '#ff7500';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 10) {
            $main_color = '#6F1E51';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 11) {
            $main_color = '#ff793f';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 12) {
            $main_color = '#ff5100';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 13) {
            $main_color = '#0b1315';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 14) {
            $main_color = '#ff4e59';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 15) {
            $main_color = '#7f2fb2';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 16) {
            $main_color = '#dd0733';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 17) {
            $main_color = '#4baf47';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 18) {
            $main_color = '#06be94';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 19) {
            $main_color = '#c98568';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 20) {
            $main_color = '#f50386';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 21) {
            $main_color = '#644222';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 22) {
            $main_color = '#f34100';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 23) {
            $main_color = '#232323';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 24) {
            $main_color = '#f25334';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 25) {
            $main_color = '#ea1826';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 26) {
            $main_color = '#214be0';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 27) {
            $main_color = '#f1a82a';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 28) {
            $main_color = '#9f974f';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 29) {
            $main_color = '#00cde5';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 30) {
            $main_color = '#1765e5';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 31) {
            $main_color = '#ff6b6b';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 32) {
            $main_color = '#fd5523';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 33) {
            $main_color = '#fd235c';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 34) {
            $main_color = '#282828';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 35) {
            $main_color = '#af3512';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 36) {
            $main_color = '#ffb237';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 37) {
            $main_color = '#21aee0';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 38) {
            $main_color = '#45b29d';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 39) {
            $main_color = '#307bc4';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 40) {
            $main_color = '#f7af21';
            $secondary_color = '#171718';
            $scroll_button_color = '#ff4500';
            $bottom_button_color = '#212529';
            $bottom_button_hover_color = '#333';
            $side_button_color = '#25d366';
        } elseif ($input['color_option'] == 41) {
            // customize color
            $main_color = $input['main_color'];
            $secondary_color = $input['secondary_color'];
            $scroll_button_color = $input['scroll_button_color'];
            $bottom_button_color = $input['bottom_button_color'];
            $bottom_button_hover_color = $input['bottom_button_hover_color'];
            $side_button_color = $input['side_button_color'];
        }

        // Update user
        ColorOption::find($id)->update(['color_option' => $input['color_option'], 'main_color' => $main_color,
            'secondary_color' => $secondary_color, 'scroll_button_color' => $scroll_button_color,
            'bottom_button_color' => $bottom_button_color, 'bottom_button_hover_color' => $bottom_button_hover_color,
            'side_button_color' => $side_button_color]);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('color-option.create');
    }
}
