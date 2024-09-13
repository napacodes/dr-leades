<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $user = Auth::user();

        return view('admin.profile.edit', compact('favicon', 'panel_image', 'user'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'profile_photo_path' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get user
        $user = User::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('profile_photo_path')){

            // Get image file
            $profile_photo_path = $request->file('profile_photo_path');

            // Folder path
            $folder ='uploads/img/profile/';

            // Make image name
            $profile_photo_path_name = time().'-'.$profile_photo_path->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$user->profile_photo_path));

            // Upload image
            $profile_photo_path->move($folder, $profile_photo_path_name);

            // Set input
            $input['profile_photo_path']= $profile_photo_path_name;

        }

        // Update user
        User::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('profile.edit');
    }

    /**
     * Display a change-password view.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password_edit()
    {
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();

        return view('admin.profile.change-password', compact('favicon', 'panel_image'));
    }

    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_password_update(Request $request)
    {
        // Get All Request
        $input = $request->all();

        // User ID
        $id = Auth::id();

        // Current password
        $current_password = Auth::User()->password;

        if (Hash::check($input['current_password'], $current_password))
        {
            // Form validation
            $request->validate([
                'password' => ['required', 'string', 'confirmed'],
            ]);

            // Update password
            User::find($id)->update([
                'password' => Hash::make($input['password']),
            ]);

            // Set a success toast, with a title
            toastr()->success('content.updated_successfully', 'content.success');

            return redirect()->route('profile.change_password_edit');

        } else {

            // Set a warning toast, with a title
            toastr()->warning('content.password_change_failed', 'content.warning');

            return redirect()->route('profile.change_password_edit');

        }
    }
}

