<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\TeamContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class TeamContentController extends Controller
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
        $team_content = TeamContent::where('team_id', $id)->first();

        return view('admin.team.content.create', compact( 'favicon', 'panel_image', 'team_content', 'id'));
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
            'team_id' => 'required',
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

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/team/breadcrumb/';

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
        TeamContent::create([
            'team_id' =>  $input['team_id'],
            'section_image' => $input['section_image'],
            'name' => $input['name'],
            'job' => $input['job'],
            'description' => Purifier::clean($input['description']),
            'expertise' => $input['expertise'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'year_title' => $input['year_title'],
            'year_description' => $input['year_description'],
            'facebook_url' => $input['facebook_url'],
            'twitter_url' => $input['twitter_url'],
            'instagram_url' => $input['instagram_url'],
            'youtube_url' => $input['youtube_url'],
            'linkedin_url' => $input['linkedin_url'],
            'breadcrumb_status' => $input['breadcrumb_status'],
            'custom_breadcrumb_image' => $input['custom_breadcrumb_image'],
            'meta_description' => $input['meta_description'],
            'meta_keyword' => $input['meta_keyword'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('team-content.create', $input['team_id']);
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
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $team_content = TeamContent::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/team/breadcrumb/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$team_content->custom_breadcrumb_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image']= $image_name;

        }

        // XSS Purifier
        $input['description'] = Purifier::clean($input['description']);

        // Update user
        TeamContent::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('team-content.create', $input['team_id']);
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
        $team_content = TeamContent::find($id);

        // Folder path
        $folder = 'uploads/img/team/';

        // Delete Image
        File::delete(public_path($folder.$team_content->section_image));

        // Update Image
        TeamContent::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('team-content.create', $team_content->team_id);

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
        $team_content = TeamContent::find($id);

        // Folder path
        $folder = 'uploads/img/team/';
        $folder2 = 'uploads/img/team/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$team_content->section_image));
        File::delete(public_path($folder2.$team_content->custom_breadcrumb_image));

        // Delete record
        $team_content->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('team-content.create', $team_content->team_id);
    }
}
