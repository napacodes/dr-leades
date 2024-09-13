<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\ServiceContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class ServiceContentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $service_content = ServiceContent::where('service_id', $id)->first();

        return view('admin.service.content.create', compact( 'favicon', 'panel_image', 'service_content', 'id'));
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
            'service_id' => 'required',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
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
            $folder = 'uploads/img/service/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/service/breadcrumb/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image']= $image_name;

        } else {
            // Set input
            $input['custom_breadcrumb_image']= null;
        }

        // Record to database
        ServiceContent::create([
            'service_id' =>  $input['service_id'],
            'section_image' => $input['section_image'],
            'description' => Purifier::clean($input['description']),
            'breadcrumb_status' => $input['breadcrumb_status'],
            'custom_breadcrumb_image' => $input['custom_breadcrumb_image'],
            'meta_description' => $input['meta_description'],
            'meta_keyword' => $input['meta_keyword'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('service-content.create', $input['service_id']);
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
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $service_content = ServiceContent::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/service/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$service_content->section_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        }

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/service/breadcrumb/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$service_content->custom_breadcrumb_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image']= $image_name;

        }

        // XSS Purifier
        $input['description'] = Purifier::clean($input['description']);

        // Update user
        ServiceContent::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('service-content.create', $input['service_id']);
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
        $service_content = ServiceContent::find($id);

        // Folder path
        $folder = 'uploads/img/service/';

        // Delete Image
        File::delete(public_path($folder.$service_content->section_image));

        // Update Image
        ServiceContent::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('service-content.create', $service_content->service_id);

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
        $service_content = ServiceContent::find($id);

        // Folder path
        $folder = 'uploads/img/service/';
        $folder2 = 'uploads/img/service/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$service_content->section_image));
        File::delete(public_path($folder2.$service_content->custom_breadcrumb_image));

        // Delete record
        $service_content->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('service-content.create', $service_content->service_id);
    }

}
