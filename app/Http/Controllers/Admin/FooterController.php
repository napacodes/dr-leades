<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterSection;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterController extends Controller
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
        $footers = Footer::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = FooterCategory::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.sections.footer_section.index', compact(  'favicon','panel_image','footers'));

        } else{

            // Set a success toast, with a title
            toastr()->success('content.please_create_a_category', 'content.success');

            return redirect()->route('footer-category.create');
        }
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
        $categories = FooterCategory::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.sections.footer_section.create', compact('favicon','panel_image','categories'));

        } else{

            // Set a success toast, with a title
            toastr()->success('content.please_create_a_category', 'content.success');

            return redirect()->route('footer-category.create');
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
            'status' => 'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Find category
        $category = FooterCategory::find($input['category_id']);

        // Record to database
        Footer::create([
            'language_id' => getLanguage()->id,
            'category_id' => $input['category_id'],
            'category_name' => $category->category_name,
            'title' => $input['title'],
            'url' => $input['url'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('footer.index');
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
        $footer = Footer::findOrFail($id);
        $categories = FooterCategory::where('language_id', $language->id)->get();

        return view('admin.sections.footer_section.edit', compact('favicon','panel_image', 'footer', 'categories'));
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
            'status' => 'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Find category
        $category = FooterCategory::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // Record to database
        Footer::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('footer.index');
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
        $footer = Footer::find($id);

        // Delete record
        $footer->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('footer.index');
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

            return redirect()->route('footer.index');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $footer = Footer::find($id);

            // Delete record
            $footer->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('footer.index');
    }
}
