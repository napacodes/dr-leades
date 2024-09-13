<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortfolioImageController extends Controller
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
        $portfolio_images = PortfolioImage::where('portfolio_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.portfolio.image.create', compact( 'favicon', 'panel_image', 'portfolio_images', 'id'));
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
            'order' => 'required|integer',
            'section_image' => 'required|mimes:svg,png,jpeg,jpg,webp,gif|max:2048'
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
            $folder = 'uploads/img/portfolio/image/';

            // Make image name
            $section_image_name = time().'-'.$section_image_file->getClientOriginalName();

            // Original size upload file
            $section_image_file->move($folder, $section_image_name);

            // Set input
            $input['section_image'] = $section_image_name;

        }

        // Record to database
        PortfolioImage::create([
            'portfolio_id' =>  $input['portfolio_id'],
            'section_image' => $input['section_image'],
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('portfolio-image.create', $input['portfolio_id']);
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
        $portfolio_image = PortfolioImage::find($id);

        return view('admin.portfolio.image.edit', compact('favicon', 'panel_image', 'portfolio_image', 'portfolio_id'));
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
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $section_image = PortfolioImage::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $section_image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/portfolio/image/';

            // Make image name
            $section_image_name =  time().'-'.$section_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$section_image->section_image));

            // Original size upload file
            $section_image_file->move($folder, $section_image_name);

            // Set input
            $input['section_image']= $section_image_name;

        }

        // Update user
        PortfolioImage::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('portfolio-image.create', $input['portfolio_id']);
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
        $section_image = PortfolioImage::find($id);

        // Folder path
        $folder = 'uploads/img/portfolio/image/';

        // Delete Image
        File::delete(public_path($folder.$section_image->section_image));

        // Delete record
        $section_image->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio-image.create', $section_image->portfolio_id);
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

            return redirect()->route('portfolio-image.create');
        }

        foreach ($arr_checked_lists as $arr_checked_list) {

            // Retrieve a model
            $section_image = PortfolioImage::findOrFail($arr_checked_list);

            // Folder path
            $folder = 'uploads/img/portfolio/image/';

            // Delete Image
            File::delete(public_path($folder.$section_image->section_image));

            // Delete record
            $section_image->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('portfolio-image.create', $id);
    }
}
