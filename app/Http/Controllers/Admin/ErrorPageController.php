<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorPageController extends Controller
{
    public function not_found()
    {
        return view('errors.404');
    }
}
