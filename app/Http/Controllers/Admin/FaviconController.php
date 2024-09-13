<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FaviconController extends Controller
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

        return view('admin.setting.favicon.create', compact('favicon', 'panel_image'));
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
            'favicon_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('favicon_image')) {

            // Get image file
            $favicon_image = $request->file('favicon_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $favicon_image_name =  time().'-'.$favicon_image->getClientOriginalName();

            // Upload image
            $favicon_image->move($folder, $favicon_image_name);

            // Set input
            $input['favicon_image']= $favicon_image_name;

        } else {
            // Set input
            $input['favicon_image']= null;
        }

        // Record to database
        Favicon::firstOrCreate([
            'favicon_image' => $input['favicon_image']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('favicon.create');
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
            'favicon_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $site_image = Favicon::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('favicon_image')){

            // Get image file
            $favicon_image = $request->file('favicon_image');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $favicon_image_name =  time().'-'.$favicon_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_image->favicon_image));

            // Upload image
            $favicon_image->move($folder, $favicon_image_name);

            // Set input
            $input['favicon_image'] = $favicon_image_name;

        }

        // Update model
        Favicon::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('favicon.create');
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
        $site_image = Favicon::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$site_image->favicon_image));

        // Update Image
        Favicon::find($id)->update(['favicon_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('favicon.create');

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
        $favicon = Favicon::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$favicon->favicon_image));

        $favicon->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('favicon.create');

    }
}
