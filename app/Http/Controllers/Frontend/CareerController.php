<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career;
use App\Models\Admin\CareerContent;
use App\Models\Admin\CareerSection;
use App\Models\Admin\ContactInfoWidget;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\HeaderInfo;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($career_slug = null)
    {

        // Default values
        $career_content = null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'career-detail-show')->first();

        // Retrieve models
        $header_info_style1 = HeaderInfo::where('language_id', $language->id)->where('style', 'style1')->first();
        $socials = Social::where('status', 1)->get();
        $header_image_style1 = HeaderImage::where('style', 'style1')->first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $contact_info_widget_style1 = ContactInfoWidget::where('language_id', $language->id)->where('style', 'style1')->first();
        $menus = Menu::with('submenus')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();
        $career_section_style1 = CareerSection::where('language_id', $language->id)->first();
        $career = Career::where('careers.career_slug', '=', $career_slug)
            ->first();
        if (!isset($career)) {
            abort(404);
        }

        if (isset($career)) {
            $career_content = CareerContent::where('career_id', $career->id)->first();
        }

        $footer_image_style1 = FooterImage::where('style', 'style1')->first();
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $footers = Footer::join("footer_categories", 'footer_categories.id', '=', 'footers.category_id')
            ->where('footer_categories.language_id', $language->id)
            ->where('footer_categories.status', 1)
            ->where('footers.status', 'published')
            ->orderBy('footers.id', 'asc')
            ->get();
        $footer_categories = FooterCategory::where('language_id', $language->id)
            ->where('footer_categories.status', 1)
            ->orderBy('order', 'asc')
            ->get();


        return view('frontend.career.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font', 'draft_view',
            'socials', 'external_url', 'contact_info_widget_style1', 'menus', 'career_section_style1', 'career',
            'career_content', 'header_info_style1', 'header_image_style1', 'footer_image_style1',
            'site_info', 'footers', 'footer_categories', 'page_builder'));

    }

}
