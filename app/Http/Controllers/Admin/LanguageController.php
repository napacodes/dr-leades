<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\FrontendKeyword;
use App\Models\Admin\Language;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\PanelImage;
use App\Models\Admin\PanelKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    // Set session for language
    public function set_locale($language_id, $site_url = null) {

        // Get site language
        $default_site_language = Language::where('default_site_language', 1)->first();

        // Via the global helper...
        session(['language_id_from_dropdown' => $language_id]);

        $language_id_from_dropdown = session()->get('language_id_from_dropdown');

        $language = Language::find($language_id_from_dropdown);

        session(['language_name_from_dropdown' => $language->language_name]);
        session(['language_code_from_dropdown' => $language->language_code]);
        session(['language_code' => $language->language_code]);
        session(['language_direction_from_dropdown' => $language->direction]);
        session(['language_default_site_from_dropdown' => $language->default_site_language]);

        if ($site_url != null) {
            $modified_url = str_replace('-bracket-', '/', $site_url);

            // Get model
            $page_builder = PageBuilder::where('page_uri', $modified_url)->first();

            if ($page_builder == null) {
                $segments = explode('/', $modified_url);
                $first_segment = end($segments);

                $page_detection = PageBuilder::where('page_uri', $first_segment)->first();

                // for slugged structures
                if ($page_detection == null) {
                    return redirect()->back();
                }

                $page_find = PageBuilder::where('page_name', $page_detection->page_name)->first();


            } else {
                // Find language version of the page
                $page_detection = PageBuilder::where('page_uri', $page_builder->page_uri)->first();

                $page_find = PageBuilder::where('page_name', $page_detection->page_name)->first();

                if ($page_find == null) {
                    return redirect()->back();
                }

            }

            if (session()->get('language_code_from_dropdown') == $default_site_language->language_code) {

                return redirect($page_find->page_uri);

            } else {

                return redirect($page_find->page_uri);

            }

        } else {

            return redirect()->back();

        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'language_name' => 'required|unique:languages',
            'language_code' => 'required|unique:languages',
            'direction' => 'required|integer|in:0,1',
            'display_dropdown' => 'required|integer|in:0,1',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        $new_language = Language::create([
            'language_name' => $input['language_name'],
            'language_code' => $input['language_code'],
            'direction' => $input['direction'],
            'display_dropdown' => $input['display_dropdown'],
            'default_site_language' => 0,
            'status' => 0
        ]);

        $copied_language = Language::first();
        $panel_keywords = PanelKeyword::where('language_id', $copied_language->id)->get();
        $frontend_keywords = FrontendKeyword::where('language_id', $copied_language->id)->get();

        if (isset($copied_language) && isset($panel_keywords) && isset($frontend_keywords)) {
            // Record to database
            foreach ($panel_keywords as $panel_keyword) {
                PanelKeyword::firstOrCreate([
                    'language_id' => $new_language->id,
                    'key' => $panel_keyword->key,
                    'value' => $panel_keyword->value,
                ]);
            }

            foreach ($frontend_keywords as $frontend_keyword) {
                FrontendKeyword::firstOrCreate([
                    'language_id' => $new_language->id,
                    'key' => $frontend_keyword->key,
                    'value' => $frontend_keyword->value,
                ]);
            }

        }

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('language.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $language = Language::findOrFail($id);

        return view('admin.language.edit', compact('favicon', 'panel_image', 'language'));
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
        // Form validation
        $validator = Validator::make($request->all(), [
            'language_name'   =>  [
                'required',
                Rule::unique('languages')->ignore($id),
            ],
            'language_code'   =>  [
                'required',
                Rule::unique('languages')->ignore($id),
            ],
            'direction' => 'required|integer|in:0,1',
            'display_dropdown' => 'required|integer|in:0,1',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        Language::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('language.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_language(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'language_id' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $language = Language::find($input['language_id']);

        if (isset($language)) {

            // Retrieve a model
            $languages = Language::all();

            foreach ($languages as $language) {

                if ($language->id == $input['language_id']) {

                    // Update to database default_site_language = 1
                    Language::find($language->id)->update(['default_site_language' => 1]);

                } else {

                    // Update to database default_site_language = 0
                    Language::find($language->id)->update(['default_site_language' => 0]);

                }

            }

            // Forget a single key...
            session()->forget('language_id_from_dropdown');
            session()->forget('language_name_from_dropdown');
            session()->forget('language_code_from_dropdown');
            session()->forget('language_direction_from_dropdown');
            session()->forget('language_default_site_from_dropdown');

            // Set a success toast, with a title
            toastr()->success('content.updated_successfully', 'content.success');

            return redirect()->route('language.create');

        } else {

            // Set a warning toast, with a title
            toastr()->warning('content.please_try_again', 'content.warning');

            return redirect()->route('language.create');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_processed_language(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'language_id' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $language = Language::find($input['language_id']);


        if (isset($language)) {

            // Retrieve a model
            $languages = Language::all();

            foreach ($languages as $language) {

                if ($language->id == $input['language_id']) {

                    // Update to database status = 1
                    Language::find($language->id)->update(['status' => 1]);

                } else {

                    // Update to database status = 0
                    Language::find($language->id)->update(['status' => 0]);

                }

            }

            // Set a success toast, with a title
            toastr()->success('content.updated_successfully', 'content.success');

            return redirect()->back();

        } else {

            // Set a warning toast, with a title
            toastr()->warning('content.please_try_again', 'content.warning');

            return redirect()->back();

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_display_dropdown($id)
    {
        //Find a model
        $language = Language::find($id);

        if ($language->display_dropdown == 1) {

            $display_dropdown = 0;

        } else {

            $display_dropdown = 1;

        }

        // Update to database
        Language::find($id)->update(['display_dropdown' => $display_dropdown]);

        // Set a warning toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('language.create');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {

            // Set a warning toast, with a title
            toastr()->warning('content.you_are_not_authorized', 'content.warning');

            return redirect()->route('language.create');

        }

        // Retrieve a model
        $language = Language::find($id);

        if (session()->has('language_id_from_dropdown')) {

            $session_language_id = session()->get('language_id_from_dropdown');

            $session_language = Language::find($session_language_id);

            if ($language->id == $session_language->id) {

                // Forget a single key...
                session()->forget('language_id_from_dropdown');
                session()->forget('language_name_from_dropdown');
                session()->forget('language_code_from_dropdown');
                session()->forget('language_direction_from_dropdown');
                session()->forget('language_default_site_from_dropdown');

            }

        }

        if ($language->default_site_language == 1 || $language->status == 1) {

            // Update to database
            Language::find(1)->update(['default_site_language' => 1, 'status' => 1]);

        }


        // Delete record
        $language->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('language.create');
    }
}
