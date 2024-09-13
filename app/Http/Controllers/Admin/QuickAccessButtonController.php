<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BottomButtonWidget;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use App\Models\Admin\SideButtonWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuickAccessButtonController extends Controller
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
        $side_button_widget = SideButtonWidget::first();
        $bottom_button_widget = BottomButtonWidget::where('language_id', $language->id)->first();

        return view('admin.setting.quick_access.create', compact('favicon', 'panel_image', 'side_button_widget', 'bottom_button_widget'));
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
            'social_media' => 'required',
            'status' => 'in:disable,enable',
            'contact' => 'required',
            'status_whatsapp' => 'in:disable,enable',
            'status_phone' => 'in:disable,enable',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        SideButtonWidget::firstOrCreate([
            'social_media' => $input['social_media'],
            'link' => $input['link'],
            'status' => $input['status'],
            'contact' => $input['contact'],
            'email_or_whatsapp' => $input['email_or_whatsapp'],
            'status_whatsapp' => $input['status_whatsapp'],
            'phone' => $input['phone'],
            'status_phone' => $input['status_phone']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('quick-access.create');
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
            'social_media' => 'required',
            'status' => 'in:disable,enable',
            'contact' => 'required',
            'status_whatsapp' => 'in:disable,enable',
            'status_phone' => 'in:disable,enable',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Update to database
        SideButtonWidget::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('quick-access.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_bottom(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'status' => 'in:disable,enable',
            'status_whatsapp' => 'in:disable,enable',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        BottomButtonWidget::firstOrCreate([
            'language_id' => getLanguage()->id,
            'button_name' => $input['button_name'],
            'phone' => $input['phone'],
            'status' => $input['status'],
            'button_name_2' => $input['button_name_2'],
            'whatsapp' => $input['whatsapp'],
            'status_whatsapp' => $input['status_whatsapp']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('quick-access.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_bottom(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'status' => 'in:disable,enable',
            'status_whatsapp' => 'in:disable,enable',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Update to database
        BottomButtonWidget::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('quick-access.create');
    }
}
