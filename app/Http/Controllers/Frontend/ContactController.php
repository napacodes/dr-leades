<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactInfo;
use App\Models\Admin\ContactInfoSection;
use App\Models\Admin\ContactInfoWidget;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\HeaderInfo;
use App\Models\Admin\Map;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('language_id', $language->id)->where('page_name', 'contact-index')->first();

        if ($page_builder === null) {
            $page_builder = PageBuilder::where('page_name', 'contact-index')->first();
        }

        // URL detection when language changes
        list($service_detail_show, $service_category_index, $portfolio_detail_show, $portfolio_category_index, $blog_detail_show, $blog_category_index, $blog_tag_index, $career_detail_show) = getPageLanguageDetection($language);

        if (!empty($page_builder->updated_item)) {

            // parse JSON data as object
            $data_object = json_decode($page_builder->updated_item, true);

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
                ->with('service_detail_show', $service_detail_show)
                ->with('service_category_index', $service_category_index)
                ->with('portfolio_detail_show', $portfolio_detail_show)
                ->with('portfolio_category_index', $portfolio_category_index)
                ->with('blog_detail_show', $blog_detail_show)
                ->with('blog_category_index', $blog_category_index)
                ->with('blog_tag_index', $blog_tag_index)
                ->with('career_detail_show', $career_detail_show)
                ->with($data)
                ->with('data_object', $data_object);

        } else {

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

            $contact_info_section_style1 = ContactInfoSection::where('language_id', $language->id)->where('style', 'style1')->first();
            $contact_infos_style1 = ContactInfo::where('language_id', $language->id)
                ->where('style', 'style1')
                ->orderBy('order', 'asc')
                ->get();
            $map_section_style1 = Map::where('language_id', $language->id)->first();

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

            return view('frontend.contact.index', compact('preloader', 'favicon', 'seo', 'google_analytic',
                'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font',
                'draft_view', 'header_info_style1', 'header_image_style1', 'socials', 'external_url', 'contact_info_widget_style1',
                'menus', 'contact_info_section_style1', 'contact_infos_style1', 'map_section_style1',
                'footer_image_style1', 'site_info', 'footers',
                'footer_categories', 'page_builder'));

        }

    }
}
