<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactInfoWidget;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\HeaderInfo;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\Social;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page_index($page_uri = '/')
    {
        // Get site language
        $language = getSiteLanguage();

        if ($page_uri == 'go-to-site-url') {
            return redirect('/');
        }

        $page_builder = PageBuilder::where('page_uri', $page_uri)->first();

        if ($page_builder === null) {
            abort(404);
        }

        if ($page_builder->page_name == 'service-detail-show' || $page_builder->page_name == 'blog-detail-show'
            || $page_builder->page_name == 'portfolio-detail-show' || $page_builder->page_name == 'team-detail-show'
            || $page_builder->page_name == 'career-detail-show' || $page_builder->page_name == 'career-detail-show') {
            return redirect('/');
        }

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        // URL detection when language changes

        if (!empty($page_builder->updated_item)) {

            // parse JSON data as object
            $data_object = json_decode($page_builder->updated_item, true);

        } elseif (!empty($page_builder->default_item)) {

            // parse JSON data as object
            $data_object = json_decode($page_builder->default_item, true);

        } else {

            // Retrieve models
            $header_image_style1 = HeaderImage::where('style', 'style1')->first();
            $external_url = ExternalUrl::where('language_id', $language->id)->first();
            $menus = Menu::with('submenus')
                ->where('language_id', $language->id)
                ->where('status', 'published')
                ->orderBy('order', 'asc')
                ->get();

            return view('frontend.page_builder.empty-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
                'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font',
                'draft_view','header_image_style1', 'external_url', 'menus', 'page_builder'));

        }

        // Get models
        $data = getModel($data_object, $language);

        return view('frontend.page_builder.index')->with('page_builder', $page_builder)
            ->with('preloader', $preloader)
            ->with('favicon', $favicon)
            ->with('seo', $seo)
            ->with('google_analytic', $google_analytic)
            ->with('tawk_to', $tawk_to)
            ->with('bottom_button_widget', $bottom_button_widget)
            ->with('side_button_widget', $side_button_widget)
            ->with('color_option', $color_option)
            ->with('breadcrumb_image', $breadcrumb_image)
            ->with('font', $font)
            ->with('draft_view', $draft_view)
            ->with($data)
            ->with('data_object', $data_object);

    }

}
