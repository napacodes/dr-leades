<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class FeatureController extends Controller
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
        $items = Feature::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();
        $item_section = FeatureSection::where('language_id', $language->id)->where('style', $style)->first();


        return view('admin.sections.feature.create', compact('favicon','panel_image','items', 'item_section', 'style'));
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
            'type' => 'in:icon,image',
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
            $folder = 'uploads/img/feature/';

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
        Feature::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'type' => $input['type'],
            'icon' => $input['icon'],
            'section_image' => $input['section_image'],
            'subtitle' => Purifier::clean($input['subtitle']),
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'order' => $input['order'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('feature.create', $input['style']);
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
        $item = Feature::findOrFail($id);

        return view('admin.sections.feature.edit', compact('favicon','panel_image','item'));
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
            'type' => 'in:icon,image',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $item = Feature::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/feature/';

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
        $input['subtitle'] = Purifier::clean($input['subtitle']);
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Record to database
        Feature::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('feature.create', $input['style']);
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
        $item = Feature::find($id);

        // Folder path
        $folder = 'uploads/img/feature/';

        // Delete Image
        File::delete(public_path($folder.$item->section_image));

        // Update Image
        Feature::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('feature.edit', $id);

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
        $item = Feature::find($id);

        // Folder path
        $folder = 'uploads/img/feature/';

        // Delete Image
        File::delete(public_path($folder.$item->section_image));

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('feature.create', $item->style);
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

            return redirect()->route('feature.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = Feature::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/feature/';

            // Delete Image
            File::delete(public_path($folder.$item->section_image));

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('feature.create', $item->style);
    }

}
