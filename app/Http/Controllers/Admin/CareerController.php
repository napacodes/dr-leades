<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career;
use App\Models\Admin\CareerCategory;
use App\Models\Admin\CareerSection;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($style = 'style1')
    {
        // Retrieving models
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $careers = Career::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();
        $categories = CareerCategory::where('language_id', $language->id)->get();
        $career_section = CareerSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.career.index', compact(  'favicon', 'panel_image', 'careers', 'career_section', 'style'));

        } else{

            // Set a warning toast, with a title
            toastr()->warning('content.please_create_a_category', 'content.warning');

            return redirect()->route('career-category.create');

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($style = 'style1')
    {
        // Retrieving models
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $categories = CareerCategory::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.career.create', compact('favicon', 'panel_image', 'categories', 'style'));

        } else{

            // Set a warning toast, with a title
            toastr()->warning('content.please_create_a_category', 'content.warning');

            return redirect()->route('career-category.create');

        }

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
            'category_id' => 'integer|required',
            'style'   =>  'in:style1',
            'title' => 'required',
            'type' => 'in:icon,image',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'status'   =>  'in:published,draft',
            'order'   =>  'required|integer',
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
            $section_image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/career/';

            // Make image name
            $section_image_name = time().'-'.$section_image_file->getClientOriginalName();

            // Original size upload file
            $section_image_file->move($folder, $section_image_name);

            // Set input
            $input['section_image']= $section_image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        // Find category
        $category = CareerCategory::find($input['category_id']);

        // Record to database
        Career::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'type' => $input['type'],
            'icon' => $input['icon'],
            'section_image' => $input['section_image'],
            'title' => $input['title'],
            'short_description' => $input['short_description'],
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
            'order' => $input['order'],
            'status' => $input['status'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('career.index', $input['style']);
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
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $career = Career::findOrFail($id);
        $categories = CareerCategory::where('language_id', $language->id)->get();

        return view('admin.career.edit', compact('favicon','panel_image', 'career', 'categories'));
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
            'category_id' => 'integer|required',
            'style'   =>  'in:style1',
            'title' => 'required',
            'type' => 'in:icon,image',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'status'   =>  'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $career = Career::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $section_image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/career/';

            // Make image name
            $section_image_name = time().'-'.$section_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$career->section_image));

            // Original size upload file
            $section_image_file->move($folder, $section_image_name);

            // Set input
            $input['section_image']= $section_image_name;

        }

        // Find category
        $category = CareerCategory::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // Record to database
        Career::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('career.index', $career->style);
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
        $career = Career::find($id);

        // Folder path
        $folder = 'uploads/img/career/';

        // Delete Image
        File::delete(public_path($folder.$career->section_image));

        // Update Image
        Career::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('career.edit', $id);

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
        $career = Career::find($id);

        // Folder path
        $folder1 = 'uploads/img/career/';

        // Delete Image
        File::delete(public_path($folder1.$career->section_image));

        // Delete record
        $career->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('career.index', $career->style);
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

            return redirect()->route('career.index');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $career = Career::find($id);

            // Folder path
            $folder1 = 'uploads/img/career/';

            // Delete Image
            File::delete(public_path($folder1.$career->section_image));

            // Delete record
            $career->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('career.index', $career->style);
    }
}
