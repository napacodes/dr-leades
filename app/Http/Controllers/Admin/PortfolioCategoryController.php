<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PortfolioCategoryController extends Controller
{
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
        $categories = PortfolioCategory::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.portfolio.category.create', compact('favicon', 'panel_image', 'categories'));
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
            'category_name' => 'required|unique:portfolio_categories|max:255',
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        PortfolioCategory::firstOrCreate([
            'language_id' => getLanguage()->id,
            'category_name' => $input['category_name'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('portfolio-category.create');
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
        $category = PortfolioCategory::findOrFail($id);

        return view('admin.portfolio.category.edit', compact('favicon', 'panel_image', 'category'));
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
            'category_name'   =>  [
                'required',
                'max:255',
                Rule::unique('portfolio_categories')->ignore($id),
            ],
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Update to database
        PortfolioCategory::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('portfolio-category.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieving a model
        $category = PortfolioCategory::find($id);

        // Delete model
        $category->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio-category.create');
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

            return redirect()->route('portfolio-category.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieving a model
            $category = PortfolioCategory::find($id);

            // Delete model
            $category->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio-category.create');
    }
}
