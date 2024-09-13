<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\FrontendKeyword;
use App\Models\Admin\PanelImage;
use App\Models\Admin\PanelKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageKeywordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving a model
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $panel_keywords = PanelKeyword::where('language_id', $id)->get();

        return view('admin.language.keyword.for_adminpanel.create', compact('favicon','panel_image', 'id', 'panel_keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontend_create($id)
    {
        // Retrieving a model
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $frontend_keywords = FrontendKeyword::where('language_id', $id)->get();

        return view('admin.language.keyword.for_frontend.create', compact('favicon','panel_image', 'id','frontend_keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_panel_keyword(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'key' => 'required',
            'value' => 'required',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        PanelKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'key' => $input['key'],
            'value' => $input['value'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_panel_keyword(Request $request)
    {
        // Get All Request
        $input = $request->all();

        $values = $input['value'];

        // Update language keywords
        foreach ($values as $key => $value) {

            PanelKeyword::findOrFail($key)->update(['value' => $value]);

        }

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_frontend_keyword(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'key' => 'required',
            'value' => 'required',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        FrontendKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'key' => $input['key'],
            'value' => $input['value'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_frontend_keyword(Request $request)
    {
        // Get All Request
        $input = $request->all();

        $values = $input['value'];

        // Update language keywords
        foreach ($values as $key => $value) {

            FrontendKeyword::findOrFail($key)->update(['value' => $value]);

        }

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id']);
    }

}
