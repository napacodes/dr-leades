<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioDetailSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortfolioDetailController extends Controller
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
        $portfolio_details = PortfolioDetail::where('portfolio_id', $id)->orderBy('id', 'desc')->get();
        $portfolio_detail_section = PortfolioDetailSection::where('portfolio_id', $id)->first();

        return view('admin.portfolio.detail.create', compact( 'favicon', 'panel_image', 'portfolio_details', 'portfolio_detail_section', 'id'));
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
            'portfolio_id' => 'required',
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
            $folder = 'uploads/img/portfolio/detail/';

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
        PortfolioDetail::create([
            'portfolio_id' =>  $input['portfolio_id'],
            'title' => $input['title'],
            'description' => $input['description'],
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('portfolio-detail.create', $input['portfolio_id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($portfolio_id, $id)
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $portfolio_detail = PortfolioDetail::find($id);

        return view('admin.portfolio.detail.edit', compact('favicon', 'panel_image', 'portfolio_detail', 'portfolio_id'));
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
        $portfolio_detail = PortfolioDetail::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/portfolio/detail/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$portfolio_detail->section_image));

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image'] = $image_name;

        }

        // Update user
        PortfolioDetail::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('portfolio-detail.create', $input['portfolio_id']);
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
        $portfolio_detail = PortfolioDetail::find($id);

        // Delete record
        $portfolio_detail->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio-detail.create', $portfolio_detail->portfolio_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request, $id)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {

            // Set a warning toast, with a title
            toastr()->warning('content.please_choose', 'content.warning');

            return redirect()->route('portfolio-detail.create');
        }

        foreach ($arr_checked_lists as $arr_checked_list) {

            // Retrieve a model
            $portfolio_detail = PortfolioDetail::findOrFail($arr_checked_list);

            // Delete record
            $portfolio_detail->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio-detail.create', $id);
    }
}
