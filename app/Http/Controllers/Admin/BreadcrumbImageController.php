<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BreadcrumbImage;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BreadcrumbImageController extends Controller
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
        $breadcrumb_image = BreadcrumbImage::first();

        return view('admin.setting.breadcrumb_image.create', compact('favicon','panel_image','breadcrumb_image'));
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
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/breadcrumb/';

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
        BreadcrumbImage::firstOrCreate([
            'section_image' => $input['section_image']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('breadcrumb-image.create');
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
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $breadcrumb_image = BreadcrumbImage::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/breadcrumb/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$breadcrumb_image->section_image));

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image'] = $image_name;

        }

        // Update model
        BreadcrumbImage::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('breadcrumb-image.create');
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
        $breadcrumb_image = BreadcrumbImage::find($id);

        // Folder path
        $folder = 'uploads/img/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$breadcrumb_image->section_image));

        // Update Image
        BreadcrumbImage::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('breadcrumb-image.create');

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
        $item_section = BreadcrumbImage::find($id);

        // Folder path
        $folder = 'uploads/img/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('breadcrumb-image.create');

    }
}
