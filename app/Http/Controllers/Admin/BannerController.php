<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class BannerController extends Controller
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
        $item_section = Banner::where('language_id', $language->id)->where('style', $style)->first();

        return view('admin.sections.banner.create', compact('favicon', 'panel_image','item_section', 'style'));
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
            'style' => 'in:style1,style2,style3,style4',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_3' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
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
            $folder = 'uploads/img/banner/';

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

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time()+1).'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        } else {
            // Set input
            $input['section_image_2']= null;
        }

        if ($request->hasFile('section_image_3')) {

            // Get image file
            $image = $request->file('section_image_3');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time()+2).'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_3']= $image_name;

        } else {
            // Set input
            $input['section_image_3']= null;
        }

        // Record to database
        Banner::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'section_image_2' => $input['section_image_2'],
            'section_image_3' => $input['section_image_3'],
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'youtube_video_url' => $input['youtube_video_url'],
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
            'button_name_2' => $input['button_name_2'],
            'button_url_2' => $input['button_url_2'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);
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
            'style' => 'in:style1,style2,style3,style4',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_3' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $item_section = Banner::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        }

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name =  (time()+1).'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image_2));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        }

        if ($request->hasFile('section_image_3')) {

            // Get image file
            $image = $request->file('section_image_3');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time()+2).'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image_3));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_3']= $image_name;

        }

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Update model
        Banner::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);
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
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));

        // Update Image
        Banner::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

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
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image_2));

        // Update Image
        Banner::find($id)->update(['section_image_2' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image_3($id)
    {
        // Retrieve a model
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image_3));

        // Update Image
        Banner::find($id)->update(['section_image_3' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

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
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));
        File::delete(public_path($folder.$item_section->section_image_2));
        File::delete(public_path($folder.$item_section->section_image_3));

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

}
