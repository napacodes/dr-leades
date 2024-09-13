<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $request->input('route');
        $style = $request->input('style');
        $single_id = $request->input('single_id');
        $service_id = $request->input('service_id');
        $portfolio_id = $request->input('portfolio_id');
        $id = $request->input('id');
        $site_url = $request->input('site_url');

        // Forget a single key...
        session()->forget('site_url');

        if ($site_url != null) {
            $modified_url = str_replace('-bracket-', '/', $site_url);

            // Via the global helper...
            session(['site_url' => $modified_url]);
        }

        if ($single_id != null) {
            return redirect()->route($route, $single_id);
        }

        if ($service_id != null & $id != null) {
            return redirect()->route($route, ['service_id' => $service_id, 'id' => $id]);
        }

        if ($portfolio_id != null & $id != null) {
            return redirect()->route($route, ['portfolio_id' => $portfolio_id, 'id' => $id]);
        }

        if ($style == null) {
            return redirect()->route($route);

        } else {
            return redirect()->route($route, $style);

        }


    }

}
