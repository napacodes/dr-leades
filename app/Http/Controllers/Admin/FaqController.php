<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;
use App\Models\Admin\FaqSection;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class FaqController extends Controller
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
        $items = Faq::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();
        $item_section = FaqSection::where('language_id', $language->id)->where('style', $style)->first();

        return view('admin.sections.faq.create', compact('favicon', 'panel_image','items', 'item_section', 'style'));
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
            'style' => 'in:style1,style2',
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
        Faq::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'question' => $input['question'],
            'answer' => Purifier::clean($input['answer']),
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('faq.create', $input['style']);
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
        $item = Faq::findOrFail($id);

        return view('admin.sections.faq.edit', compact('favicon', 'panel_image','item'));
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
            'style' => 'in:style1,style2',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // XSS Purifier
        $input['answer'] = Purifier::clean($input['answer']);

        // Record to database
        Faq::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('faq.create', $input['style']);
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
        $item = Faq::find($id);

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('faq.create', $item->style);
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

            return redirect()->route('faq.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = Faq::findOrFail($id);

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('faq.create', $item->style);
    }
}
