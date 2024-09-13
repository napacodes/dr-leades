<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutSection;
use App\Models\Admin\AboutSectionFeature;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class AboutSectionController extends Controller
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
        $item_section = AboutSection::where('language_id', $language->id)->where('style', $style)->first();
        $features = AboutSectionFeature::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();

        return view('admin.sections.about.create', compact('favicon', 'panel_image','item_section', 'features', 'style'));
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
            'video_type'   =>  'in:youtube,other',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'cv_file' => 'mimes:pdf|max:10240',
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
            $folder = 'uploads/img/about/';

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

        if ($request->hasFile('cv_file')) {

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make cv name
            $cv_file_name = time().'-'.$cv_file->getClientOriginalName();

            // Upload file
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;

        } else {
            // Set input
            $input['cv_file']= null;
        }

        // Record to database
        AboutSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'video_type' => $input['video_type'],
            'video_url' => $input['video_url'],
            'section_title' => Purifier::clean($input['section_title']),
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
            'button_name_2' => $input['button_name_2'],
            'cv_file' => $input['cv_file'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
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
            'video_type' => 'in:youtube,other',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'cv_file' => 'mimes:pdf|max:10240',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $item_section = AboutSection::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        }

        if ($request->hasFile('cv_file')) {

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->cv_file));

            // Upload image
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;
        }

        // XSS Purifier
        $input['section_title'] = Purifier::clean($input['section_title']);
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Update model
        AboutSection::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));

        // Update Image
        AboutSection::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->cv_file));

        // Update Image
        AboutSection::find($id)->update(['cv_file' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));
        File::delete(public_path($folder.$item_section->cv_file));

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_feature(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style1',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        AboutSectionFeature::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'order' => $input['order'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_feature($id)
    {
        // Retrieving models
        $item = AboutSectionFeature::findOrFail($id);

        return view('admin.sections.about.edit_feature', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_feature(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style1',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Record to database
        AboutSectionFeature::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_feature($id)
    {
        // Retrieve a model
        $item = AboutSectionFeature::find($id);

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item->style);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_feature_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {

            // Set a warning toast, with a title
            toastr()->warning('content.please_choose', 'content.warning');

            return redirect()->route('about.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = AboutSectionFeature::findOrFail($id);

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item->style);
    }

}
