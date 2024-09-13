<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CareerSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class CareerSectionController extends Controller
{
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
            'section_item' => 'integer|required',
            'paginate_item' => 'integer|required',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        CareerSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'section_title' => Purifier::clean($input['section_title']),
            'title' => Purifier::clean($input['title']),
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
            'company_title' => Purifier::clean($input['company_title']),
            'company_description' => Purifier::clean($input['company_description']),
            'company_contact_title' => $input['company_contact_title'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'section_item' => $input['section_item'],
            'paginate_item' => $input['paginate_item']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('career.index', $input['style']);
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
            'section_item' => 'integer|required',
            'paginate_item' => 'integer|required',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // XSS Purifier
        $input['section_title'] = Purifier::clean($input['section_title']);
        $input['title'] = Purifier::clean($input['title']);
        $input['company_title'] = Purifier::clean($input['company_title']);
        $input['company_description'] = Purifier::clean($input['company_description']);

        // Update model
        CareerSection::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('career.index', $input['style']);
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
        $item_section = CareerSection::find($id);

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('career.index', $item_section->style);

    }
}
