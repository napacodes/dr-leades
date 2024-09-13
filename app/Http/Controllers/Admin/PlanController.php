<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\Plan;
use App\Models\Admin\PlanSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $items = Plan::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $item_section = PlanSection::where('language_id', $language->id)->first();

        return view('admin.sections.plan.create', compact('favicon', 'panel_image', 'items', 'item_section'));
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
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        Plan::create([
            'language_id' => getLanguage()->id,
            'name' => $input['name'],
            'tag' => $input['tag'],
            'currency' => $input['currency'],
            'price' => $input['price'],
            'extra_text' => $input['extra_text'],
            'feature_list' => $input['feature_list'],
            'non_feature_list' => $input['non_feature_list'],
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
            'recommended' => $input['recommended'],
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('plan.create');
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
        $item = Plan::find($id);

        return view('admin.sections.plan.edit', compact('favicon', 'panel_image', 'item'));
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
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $item = Plan::find($id);

        // Get All Request
        $input = $request->all();

        // Record to database
        Plan::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('plan.create');
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
        $item = Plan::find($id);

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('plan.create');
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

            return redirect()->route('plan.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = Plan::findOrFail($id);

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('plan.create');
    }
}
