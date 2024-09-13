<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();

        // Retrieving models for Landing Site
        $blogs_count = Blog::all()->count();

        return view('admin.dashboard', compact('favicon', 'panel_image', 'blogs_count'));

    }
}
