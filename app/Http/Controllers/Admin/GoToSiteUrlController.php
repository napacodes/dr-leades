<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;

class GoToSiteUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($site_url = null)
    {
        // Forget a single key...
        session()->forget('site_url');

        if ($site_url != null) {
            return redirect($site_url);
        } else {
            return redirect('/');
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index_2($site_url = null, $slug = null)
    {
        // Forget a single key...
        session()->forget('site_url');

        if ($slug != null) {
            // for slugged blog etc..
            return redirect($site_url.'/'.$slug);
        } else {
            return redirect($site_url);
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index_3($site_url = null, $segment = null, $slug = null)
    {
        // Forget a single key...
        session()->forget('site_url');

        if ($site_url != null && $segment != null &&$slug != null) {
            // for slugged blog etc..
            return redirect($site_url.'/'.$segment.'/'.$slug);
        } else {
            return redirect('/');
        }

    }


}
