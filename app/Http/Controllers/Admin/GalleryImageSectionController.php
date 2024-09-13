<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GalleryImageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class GalleryImageSectionController extends Controller
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
        GalleryImageSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'section_item' => $input['section_item'],
            'paginate_item' => $input['paginate_item']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('gallery.index');
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
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Update model
        GalleryImageSection::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('gallery.index');
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
        $item_section = GalleryImageSection::find($id);

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('gallery.index');

    }
}
