<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HeaderImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($style = 'style1')
    {
        // Retrieving a model
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $header_image = HeaderImage::where('style', $style)->first();

        return view('admin.setting.header_image.create', compact('favicon','panel_image', 'header_image', 'style'));
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
            'section_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
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
            $folder = 'uploads/img/general/';

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

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $image_name =  (time()+1).'-'.$image->getClientOriginalName();

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        } else {
            // Set input
            $input['section_image_2']= null;
        }


        // Record to database
        HeaderImage::firstOrCreate([
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'section_image_2' => $input['section_image_2'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('header-image.create', $input['style']);
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
            'section_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $header_image = HeaderImage::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$header_image->section_image));

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image'] = $image_name;

        }

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $image_name = (time()+1).'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$header_image->section_image_2));

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2'] = $image_name;

        }

        // Update model
        HeaderImage::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('header-image.create', $input['style']);
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
        $header_image = HeaderImage::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$header_image->section_image));

        // Update Image
        HeaderImage::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('header-image.create', $header_image->style);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image_2($id)
    {
        // Retrieve a model
        $header_image = HeaderImage::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$header_image->section_image_2));

        // Update Image
        HeaderImage::find($id)->update(['section_image_2' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('header-image.create', $header_image->style);

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
        $header_image = HeaderImage::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$header_image->section_image));
        File::delete(public_path($folder.$header_image->section_image_2));

        $header_image->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('header-image.create', $header_image->style);

    }
}
