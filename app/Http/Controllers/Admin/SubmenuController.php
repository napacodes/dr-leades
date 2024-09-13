<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\PanelImage;
use App\Models\Admin\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmenuController extends Controller
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
        $menus = Menu::where('language_id', $language->id)->get();
        $submenus = Submenu::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $pages = PageBuilder::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        if (count($menus) > 0) {

            return view('admin.menu.submenu.create', compact('favicon', 'panel_image', 'menus', 'submenus', 'pages'));

        } else{

            // Set a warning toast, with a title
            toastr()->warning('content.please_create_a_category', 'content.warning');

            return redirect()->route('menu.create');

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
            'menu_id'   =>  'integer|required',
            'submenu_name'   =>  'required',
            'status'   =>  'in:published,draft',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Find category
        $menu = Menu::find($input['menu_id']);

        // Record to database
        Submenu::create([
            'language_id' => getLanguage()->id,
            'menu_name' => $menu->menu_name,
            'menu_id' => $input['menu_id'],
            'submenu_name' => $input['submenu_name'],
            'uri' => $input['uri'],
            'url' => $input['url'],
            'view' => 0,
            'status' => $input['status'],
            'order' => $input['order'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('submenu.create');
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
        $submenu = Submenu::findOrFail($id);
        $menus = Menu::where('language_id', $language->id)->get();
        $pages = PageBuilder::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.menu.submenu.edit', compact('favicon', 'panel_image', 'submenu', 'menus', 'pages'));
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
            'menu_id' => 'integer|required',
            'submenu_name' => 'required',
            'status' => 'in:published,draft',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Find category
        $menu = Menu::find($input['menu_id']);
        $input['menu_name'] = $menu->menu_name;

        // Update to database
        Submenu::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('submenu.create');
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
        $submenu = Submenu::find($id);

        // Delete record
        $submenu->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('submenu.create');
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

            return redirect()->route('submenu.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $submenu = Submenu::findOrFail($id);

            // Delete record
            $submenu->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('submenu.create');
    }
}

