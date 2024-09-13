<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoModeController extends Controller
{
    public function update_demo_mode()
    {
        return redirect()->back()->with('warning', 'This is Demo version. You cannot add or change anything.');
    }
}
