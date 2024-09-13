<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\Page;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Retrieving models
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $pages = Page::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $page_builder = PageBuilder::where('language_id', $language->id)->where('page_name', 'page-detail-show')->first();

        return view('admin.page.index', compact( 'favicon', 'panel_image', 'pages', 'page_builder'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Retrieving models
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();

        return view('admin.page.create', compact('favicon', 'panel_image'));

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
            'title'   =>  'required',
            'order' => 'required|integer',
            'status'   =>  'in:published,draft',
            'section_image'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
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
            $folder = 'uploads/img/page/';

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
            $folder = 'uploads/img/page/breadcrumb/';

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
        Page::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'description' => Purifier::clean($input['description']),
            'section_image' => $input['section_image'],
            'order' => $input['order'],
            'status' => $input['status'],
            'breadcrumb_status' => $input['breadcrumb_status'],
            'custom_breadcrumb_image' => $input['custom_breadcrumb_image'],
            'meta_description' => $input['meta_description'],
            'meta_keyword' => $input['meta_keyword'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('page.index');
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
        $page = Page::findOrFail($id);

        return view('admin.page.edit', compact('favicon', 'panel_image','page'));
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
        $validator = Validator::make($request->all(), [
            'title'   =>  'required',
            'status'   =>  'in:published,draft',
            'section_image'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $page = Page::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/page/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$page->section_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        }

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/page/breadcrumb/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$page->custom_breadcrumb_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image']= $image_name;

        }

        // XSS Purifier
        $input['description'] = Purifier::clean($input['description']);

        // Update to database
        Page::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('page.index');
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
        $page = Page::find($id);

        // Folder path
        $folder = 'uploads/img/page/';

        // Delete Image
        File::delete(public_path($folder.$page->section_image));

        // Update Image
        Page::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page.edit', $id);

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
        $page = Page::find($id);

        // Folder path
        $folder = 'uploads/img/blog/';
        $folder2 = 'uploads/img/blog/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$page->section_image));
        File::delete(public_path($folder2.$page->custom_breadcrumb_image));

        // Delete record
        $page->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page.index');
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

            return redirect()->route('page.index');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $page = Page::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/page/';
            $folder2 = 'uploads/img/page/breadcrumb/';

            // Delete Image
            File::delete(public_path($folder.$page->section_image));
            File::delete(public_path($folder2.$page->custom_breadcrumb_image));

            // Delete record
            $page->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page.index');
    }
}
