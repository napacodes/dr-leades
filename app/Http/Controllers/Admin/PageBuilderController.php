<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Favicon;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\PageName;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mews\Purifier\Facades\Purifier;

class PageBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $page_names = PageName::get();
        $pages = PageBuilder::orderBy('id', 'desc')
            ->get();

        // create array
        $page_builders = [];
        $currentPageName = null;

        // reorder by same name
        foreach ($pages as $page) {
            if ($currentPageName === null || $currentPageName !== $page->page_name) {
                $currentPageName = $page->page_name;
            }

            $page_builders[$currentPageName][] = $page;
        }

        if (count($page_names) > 0) {

            return view('admin.page_builder.create', compact('favicon', 'panel_image', 'page_names', 'page_builders'));

        } else{

            // Set a success toast, with a title
            toastr()->success('content.please_create_a_category', 'content.success');

            return redirect()->route('page-name.create');
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
            'page_name_id'   =>  'integer|required',
            'page_uri'   =>  'required|unique:page_builders|max:255',
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Retrieving models
        $page_builders = PageBuilder::orderBy('id', 'desc')
            ->get();

        // Find category
        $page_name = PageName::find($input['page_name_id']);

        // Record to database
        PageBuilder::firstOrCreate([
            'page_uri' => $input['page_uri'],
            'page_name' => $page_name->page_name,
            'page_name_id' => $input['page_name_id'],
            'status' => $input['status'],
            'is_default' => 'no',
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('page-builder.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Default variable
        $left_items = null;

        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $page_builder = PageBuilder::findOrFail($id);

        $json1 = '[{"id":"header-style1","folder":"header","order":0},
        {"id":"breadcrumb-style1","folder":"breadcrumb","order":0},
        {"id":"banner-style1","folder":"banner","order":0},{"id":"banner-style2","folder":"banner","order":0},
        {"id":"banner-style3","folder":"banner","order":0},{"id":"banner-style4","folder":"banner","order":0},
        {"id":"feature-style1","folder":"feature","order":0},
        {"id":"about-style1","folder":"about","order":0},
        {"id":"history-style1","folder":"history","order":0},
        {"id":"counter-style1","folder":"counter","order":0},
        {"id":"work-process-style1","folder":"work_process","order":0},
        {"id":"why-choose-style1","folder":"why_choose","order":0},
        {"id":"call-to-action-style1","folder":"call_to_action","order":0},
        {"id":"testimonial-style1","folder":"testimonial","order":0},
        {"id":"sponsor-style1","folder":"sponsor","order":0},
        {"id":"video-style1","folder":"video","order":0},
        {"id":"subscribe-style1","folder":"subscribe","order":0},
        {"id":"service-style1","folder":"service","order":0},{"id":"service-style2","folder":"service","order":0},
        {"id":"faq-style1","folder":"faq","order":0},{"id":"faq-style2","folder":"faq","order":0},
        {"id":"gallery-style1","folder":"gallery","order":0},{"id":"gallery-style2","folder":"gallery","order":0},
        {"id":"team-style1","folder":"team","order":0},{"id":"team-style2","folder":"team","order":0},
        {"id":"portfolio-style1","folder":"portfolio","order":0},{"id":"portfolio-style2","folder":"portfolio","order":0},
        {"id":"plan-style1","folder":"plan","order":0},
        {"id":"career-style1","folder":"career","order":0},{"id":"career-style2","folder":"career","order":0},
        {"id":"blog-style1","folder":"blog","order":0},{"id":"blog-style2","folder":"blog","order":0},
        {"id":"contact-style1","folder":"contact","order":0},
        {"id":"map-style1","folder":"map","order":0},
        {"id":"footer-style1","folder":"footer","order":0}]';

        if (($page_builder->default_item != null && $page_builder->is_default = 'yes')) {

            if (!empty($page_builder->updated_item)) {
                $json2 = $page_builder->updated_item;
            } else {
                $json2 = $page_builder->default_item;
            }

            $array1 = json_decode($json1, true);
            $array2 = json_decode($json2, true);

            $unique_items = array_filter($array1, function($item) use ($array2) {
                foreach ($array2 as $item2) {
                    if ($item['id'] === $item2['id']) {
                        return false; // Matching item found, not unique
                    }
                }
                return true; // No matching items, unique
            });

            $left_items = array_values($unique_items); // Rearranging the array based on index
        } else {
            $left_items =  json_decode($json1, true);
        }

        return view('admin.page_builder.edit', compact('favicon', 'panel_image', 'page_builder', 'left_items'));
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
            'page_uri'   =>  [
                'required',
                'max:255',
                Rule::unique('page_builders')->ignore($id),
            ],
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $page_builder = PageBuilder::find($id);

        // Get All Request
        $input = $request->all();

      if (isset($input['updated_item'])) {
          // Get input value
          $json_updated_item = $input['updated_item'];

          if ($json_updated_item != null) {

              // Try to convert JSON data
              $decoded_updated_item = json_decode($json_updated_item);

              if (json_last_error() !== JSON_ERROR_NONE) {

                  // Set a warning toast, with a title
                  toastr()->warning('content.the_transaction_is_invalid', 'content.warning');

                  // Warn the user if JSON is not valid or there is a conversion error
                  return redirect()->back();

              }

          }
      }

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image_file = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/page_builder/breadcrumb/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image'] = $image_name;

        }

        // XSS Purifier
        $input['breadcrumb_item'] = Purifier::clean($input['breadcrumb_item']);

        if ($page_builder->is_default == 'yes') {

            // set $input['page_name']
            $input['page_name'] = $page_builder->page_name;

        }

        // set $input['is_default']
        $input['is_default'] = $page_builder->is_default;

        // set $input['left_item']
        $input['left_item'] = $page_builder->default_item;

        // Update to database
        PageBuilder::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('page-builder.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieving a model
        $page_builder = PageBuilder::find($id);

        if ($page_builder->is_default == 'yes') {

            // Set a warning toast, with a title
            toastr()->warning('content.the_transaction_is_invalid', 'content.warning');

            return redirect()->route('page-builder.create');

        }

        // Delete model
        $page_builder->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page-builder.create');
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

            return redirect()->route('page-builder.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $page_builder = PageBuilder::findOrFail($id);

            if ($page_builder->is_default == 'yes') {

                // Set a warning toast, with a title
                toastr()->warning('content.the_transaction_is_invalid', 'content.warning');

                return redirect()->route('page-builder.create');

            }

            // Delete record
            $page_builder->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('page-builder.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function default_page_update($id)
    {
        // Update to database
        PageBuilder::find($id)->update(['updated_item' => null]);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('page-builder.create');
    }

}
