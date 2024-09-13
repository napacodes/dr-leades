<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CallToAction;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class CallToActionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($style = 'style1')
    {
        // Retrieving a model
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $call_to_action = CallToAction::where('language_id', $language->id)->where('style', $style)->first();

        return view('admin.sections.call_to_action.create', compact('favicon', 'panel_image','call_to_action', 'style'));
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
            'style' => 'in:style1',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        CallToAction::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'title' => Purifier::clean($input['title']),
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('call-to-action.create', $input['style']);
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
            'style' => 'in:style1',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);

        // Update model
        CallToAction::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('call-to-action.create', $input['style']);
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
        $item_section = CallToAction::find($id);

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('call-to-action.create', $item_section->style);

    }
}
