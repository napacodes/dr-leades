<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $roles = Role::all();

        return view('admin.admin_role.index', compact('favicon','panel_image','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $panel_image = PanelImage::first();
        $permissions = Permission::all();

        return view('admin.admin_role.create', compact('panel_image','permissions'));
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
            'name'   =>  'required|unique:roles|max:255',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Permissions see the result array
        $is_ok_permissions = $request->input('is_ok');

        if ($is_ok_permissions == null) {

            // Set a warning toast, with a title
            toastr()->warning('warning.please_select_a_permission', 'content.warning');

            return redirect()->route('admin-role.create');

        } else {

            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // Record to database
            $role = Role::firstOrCreate([
                'name' => $request->input('name'),
                'guard_name' => 'web',
            ]);

            // Give permissions for role
            for($i = 0; $i < count($is_ok_permissions); $i++)
            {
                $role->givePermissionTo($is_ok_permissions[$i]);
            }

            // Set a success toast, with a title
            toastr()->success('content.created_successfully', 'content.success');

            return redirect()->route('admin-role.index');

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // super-admin cannot be edited.
        // Get role
        $role = Role::find($id);

        if ($role->name != 'super-admin') {

            // Retrieving models
            $role = Role::findOrFail($id);
            $permissions = Permission::all();

            return view('admin.admin_role.edit', compact( 'role', 'permissions'));

        } else {

            // Set a warning toast, with a title
            toastr()->warning('warning.you_are_not_authorized', 'content.warning');

            return redirect()->route('admin-role.index');

        }

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
            'name'   =>  [
                'required',
                'max:255',
                Rule::unique('roles')->ignore($id),
            ],
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Get all permission and convert array
        $permissions = Permission::all();
        $arr_permissions = array();
        foreach ($permissions as $permission) {
            $arr_permissions[] = $permission->name;
        }

        // Permissions see the result array
        $is_ok_permissions = $request->input('is_ok');

        if ($is_ok_permissions == null) {

            // Set a warning toast, with a title
            toastr()->warning('warning.please_select_a_permission', 'content.warning');

            return redirect()->route('admin-role.edit', $id);

        } else {

            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // Update to database
            Role::find($id)->update($input);

            // Get role
            $role = Role::find($id);

            // Give permissions for role
            for($i = 0; $i < count($is_ok_permissions); $i++)
            {
                $role->givePermissionTo($is_ok_permissions[$i]);
            }

            // Revoke permissions for role
            for($i = 0; $i < count($arr_permissions); $i++)
            {
                if (!in_array($arr_permissions[$i], $is_ok_permissions)) {
                    $role->revokePermissionTo($arr_permissions[$i]);
                }
            }

            // Set a success toast, with a title
            toastr()->success('success.created_successfully', 'content.success');

            return redirect()->route('admin-role.index');

        }

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
        $role = Role::find($id);

        if ($role->name != 'super-admin') {

            // Delete record
            $role->delete();

            // Set a success toast, with a title
            toastr()->success('success.deleted_successfully', 'content.success');

            return redirect()->route('admin-role.index');

        } else {

            // Set a warning toast, with a title
            toastr()->warning('warning.you_are_not_authorized', 'content.warning');

            return redirect()->route('admin-role.index');

        }

    }
}
