<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PageName;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PageNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $page_names = PageName::orderBy('id', 'desc')
            ->get();

        return view('admin.page_name.create', compact('favicon', 'panel_image', 'page_names'));
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
            'page_name'   =>  'required|unique:page_names|max:255',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        PageName::firstOrCreate([
            'page_name' => $input['page_name'],
            'is_default' => 'no',
            'segment_count' => 1,
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('page-name.create');
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
        $page_name = PageName::findOrFail($id);

        return view('admin.page_name.edit', compact('favicon', 'panel_image', 'page_name'));
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
            'page_name'   =>  [
                'required',
                'max:255',
                Rule::unique('page_names')->ignore($id),
            ],
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Find model
        $page_name = PageName::find($id);

        if ($page_name->is_default == 'yes') {

            // Set a warning toast, with a title
            toastr()->warning('content.the_transaction_is_invalid', 'content.warning');

            return redirect()->route('page-name.create');

        }

        // Get All Request
        $input = $request->all();

        // Update to database
        PageName::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('page-name.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieving a model
        $page_name = PageName::find($id);

        if ($page_name->is_default == 'yes') {

            // Set a warning toast, with a title
            toastr()->warning('content.the_transaction_is_invalid', 'content.warning');

            return redirect()->route('page-name.create');

        }

        // Delete model
        $page_name->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page-name.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {

            // Set a warning toast, with a title
            toastr()->warning('content.please_choose', 'content.warning');

            return redirect()->route('page-name.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $page_name = PageName::findOrFail($id);

            if ($page_name->is_default == 'yes') {

                // Set a warning toast, with a title
                toastr()->warning('content.the_transaction_is_invalid', 'content.warning');

                return redirect()->route('page-name.create');

            }

            // Delete record
            $page_name->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page-name.create');
    }
}
