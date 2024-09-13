<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();
        $categories = PortfolioCategory::where('language_id', $language->id)->get();
        $portfolio_section = PortfolioSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.portfolio.index', compact(  'favicon', 'panel_image', 'portfolios', 'portfolio_section', 'style'));

        } else{

            // Set a warning toast, with a title
            toastr()->warning('content.please_create_a_category', 'content.warning');

            return redirect()->route('portfolio-category.create');

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
        $categories = PortfolioCategory::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.portfolio.create', compact('favicon', 'panel_image', 'categories', 'style'));

        } else{

            // Set a success toast, with a title
            toastr()->success('content.please_create_a_category', 'content.success');

            return redirect()->route('portfolio-category.create');

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
            'section_image'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
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
            $folder = 'uploads/img/portfolio/';

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
        $category = PortfolioCategory::find($input['category_id']);

        // Record to database
        Portfolio::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'title' => $input['title'],
            'section_image' => $input['section_image'],
            'url' => $input['url'],
            'order' => $input['order'],
            'status' => $input['status'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('portfolio.index', $input['style']);
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
        $portfolio = Portfolio::findOrFail($id);
        $categories = PortfolioCategory::where('language_id', $language->id)->get();

        return view('admin.portfolio.edit', compact('favicon','panel_image', 'portfolio', 'categories'));
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
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'status'   =>  'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $portfolio = Portfolio::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $section_image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/portfolio/';

            // Make image name
            $section_image_name = time().'-'.$section_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$portfolio->section_image));

            // Original size upload file
            $section_image_file->move($folder, $section_image_name);

            // Set input
            $input['section_image'] = $section_image_name;

        }

        // Find category
        $category = PortfolioCategory::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // Record to database
        Portfolio::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('portfolio.index', $portfolio->style);
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
        $portfolio = Portfolio::find($id);

        // Folder path
        $folder = 'uploads/img/portfolio/';

        // Delete Image
        File::delete(public_path($folder.$portfolio->section_image));

        // Update Image
        Portfolio::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio.edit', $id);

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
        $portfolio = Portfolio::find($id);

        // Folder path
        $folder1 = 'uploads/img/portfolio/';

        // Delete Image
        File::delete(public_path($folder1.$portfolio->section_image));

        // Delete record
        $portfolio->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio.index', $portfolio->style);
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

            return redirect()->route('portfolio.index');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $portfolio = Portfolio::find($id);

            // Folder path
            $folder1 = 'uploads/img/portfolio/';

            // Delete Image
            File::delete(public_path($folder1.$portfolio->section_image));

            // Delete record
            $portfolio->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio.index', $portfolio->style);
    }
}
