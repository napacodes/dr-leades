<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Category;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Retrieving models
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $blogs = Blog::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = Category::where('language_id', $language->id)->get();
        $blog_section = BlogSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.blog.post.index', compact( 'favicon', 'panel_image','blogs', 'categories', 'blog_section'));

        } else{

            // Set a success toast, with a title
            toastr()->success('content.please_create_a_category', 'content.warning');

            return redirect()->route('blog-category.create');
        }

    }

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
        $categories = Category::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.blog.post.create', compact('favicon', 'panel_image','categories'));

        } else{

            // Set a success toast, with a title
            toastr()->success('content.please_create_a_category', 'content.success');

            return redirect()->route('blog-category.create');

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
            'category_id'   =>  'integer|required',
            'title'   =>  'required',
            'type' => 'in:with_this_account,anonymous',
            'order' => 'required|integer',
            'status'   =>  'in:published,draft',
            'image_status'   =>  'in:show,hide',
            'section_image'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_2'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/blog/thumbnail/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/blog/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        } else {
            // Set input
            $input['section_image_2']= null;
        }

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/service/breadcrumb/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image']= $image_name;

        } else {
            // Set input
            $input['custom_breadcrumb_image']= null;
        }

        // Set author
        $author_name = null;
        $user_id = null;

        if ($input['type'] == "with_this_account") {
            $author_name =  Auth::user()->name;
            $user_id = Auth::id();
        }

        // Find category
        $category = Category::find($input['category_id']);

        // Record to database
        Blog::create([
            'language_id' => getLanguage()->id,
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'author_name' => $author_name,
            'user_id' => $user_id,
            'title' => $input['title'],
            'description' => Purifier::clean($input['description']),
            'short_description' => $input['short_description'],
            'section_image' => $input['section_image'],
            'section_image_2' => $input['section_image_2'],
            'image_status' => $input['image_status'],
            'type' => $input['type'],
            'view' => 0,
            'order' => $input['order'],
            'status' => $input['status'],
            'tag' => $input['tag'],
            'breadcrumb_status' => $input['breadcrumb_status'],
            'custom_breadcrumb_image' => $input['custom_breadcrumb_image'],
            'meta_description' => $input['meta_description'],
            'meta_keyword' => $input['meta_keyword'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('blog.index');
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
        $blog = Blog::findOrFail($id);
        $categories = Category::where('language_id', $language->id)->get();

        return view('admin.blog.post.edit', compact('favicon', 'panel_image','blog', 'categories'));
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
            'category_id'   =>  'integer|required',
            'title'   =>  'required',
            'type' => 'in:with_this_account,anonymous',
            'status'   =>  'in:published,draft',
            'image_status'   =>  'in:show,hide',
            'section_image'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_2'   =>  'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'breadcrumb_status' => 'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $blog = Blog::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/blog/thumbnail/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->section_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        }

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/blog/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->section_image_2));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        }

        if ($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $image = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/blog/breadcrumb/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->custom_breadcrumb_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['custom_breadcrumb_image']= $image_name;

        }

        // Set author
        if ($input['type'] == "with_this_account") {
            $author_name =  Auth::user()->name;
            $user_id = Auth::id();
        }

        // Find category
        $category = Category::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // XSS Purifier
        $input['description'] = Purifier::clean($input['description']);

        // Update to database
        Blog::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image($id)
    {
        // Retrieve a model
        $blog = Blog::find($id);

        // Folder path
        $folder = 'uploads/img/blog/';

        // Delete Image
        File::delete(public_path($folder.$blog->section_image));

        // Update Image
        Blog::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('blog.edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image_2($id)
    {
        // Retrieve a model
        $blog = Blog::find($id);

        // Folder path
        $folder = 'uploads/img/blog/';

        // Delete Image
        File::delete(public_path($folder.$blog->section_image_2));

        // Update Image
        Blog::find($id)->update(['section_image_2' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('blog.edit', $id);

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
        $blog = Blog::find($id);

        // Folder path
        $folder = 'uploads/img/blog/';
        $folder1 = 'uploads/img/blog/thumbnail/';
        $folder2 = 'uploads/img/blog/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$blog->section_image));
        File::delete(public_path($folder1.$blog->section_image_2));
        File::delete(public_path($folder2.$blog->custom_breadcrumb_image));

        // Delete record
        $blog->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('blog.index');
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

            return redirect()->route('blog.index');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $blog = Blog::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/blog/';
            $folder1 = 'uploads/img/blog/thumbnail/';
            $folder2 = 'uploads/img/blog/breadcrumb/';

            // Delete Image
            File::delete(public_path($folder.$blog->section_image));
            File::delete(public_path($folder1.$blog->section_image_2));
            File::delete(public_path($folder2.$blog->custom_breadcrumb_image));

            // Delete record
            $blog->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('blog.index');
    }
}
