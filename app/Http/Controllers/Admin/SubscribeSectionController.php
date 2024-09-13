<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\SubscribeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeSectionController extends Controller
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
        $subscribe_section = SubscribeSection::where('language_id', $language->id)->where('style', $style)->first();

        return view('admin.sections.subscribe.create', compact('favicon', 'panel_image', 'subscribe_section', 'style'));
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
        SubscribeSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'title' => $input['title'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('subscribe-section.create', $input['style']);
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

        // Update model
        SubscribeSection::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('subscribe-section.create', $input['style']);
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
        $subscribe_section = SubscribeSection::find($id);

        $subscribe_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('subscribe-section.create', $subscribe_section->style);

    }
}
