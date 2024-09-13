<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\WorkProcess;
use App\Models\Admin\WorkProcessSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class WorkProcessController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($style = 'style1')
    {
        // Retrieving a model
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $items = WorkProcess::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();
        $item_section = WorkProcessSection::where('language_id', $language->id)->where('style', $style)->first();

        return view('admin.sections.work_process.create', compact('favicon','panel_image','items', 'item_section', 'style'));
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
            'style' => 'in:style1',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/work_process/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        // Record to database
        WorkProcess::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'title' => Purifier::clean($input['title']),
            'order' => $input['order'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('work-process.create', $input['style']);
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
        $item = WorkProcess::findOrFail($id);

        return view('admin.sections.work_process.edit', compact('favicon','panel_image','item'));
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
            'style' => 'in:style1',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $item = WorkProcess::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/work_process/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item->section_image));

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image'] = $image_name;

        }

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);

        // Record to database
        WorkProcess::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('work-process.create', $input['style']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image($id)
    {
        // Retrieve a model
        $item = WorkProcess::find($id);

        // Folder path
        $folder = 'uploads/img/work_process/';

        // Delete Image
        File::delete(public_path($folder.$item->section_image));

        // Update Image
        WorkProcess::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('work-process.edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $item = WorkProcess::find($id);

        // Folder path
        $folder = 'uploads/img/work_process/';

        // Delete Image
        File::delete(public_path($folder.$item->section_image));

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('work-process.create', $item->style);
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

            return redirect()->route('work-process.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = WorkProcess::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/work_process/';

            // Delete Image
            File::delete(public_path($folder.$item->section_image));

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('work-process.create', $item->style);
    }

}
