<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactInfoWidget;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\HeaderInfo;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioContent;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioDetailSection;
use App\Models\Admin\PortfolioImage;
use App\Models\Admin\PortfolioSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($portfolio_slug = null)
    {

        // Default values
        $portfolio_content = null;
        $portfolio_detail_section = null;
        $portfolio_details = null;
        $portfolio_info = null;
        $portfolio_images = null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'portfolio-detail-show')->first();

        // Retrieve models
        $header_info_style1 = HeaderInfo::where('language_id', $language->id)->where('style', 'style1')->first();
        $header_image_style1 = HeaderImage::where('style', 'style1')->first();
        $contact_info_widget_style1 = ContactInfoWidget::where('language_id', $language->id)->where('style', 'style1')->first();
        $socials = Social::where('status', 1)->get();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $menus = Menu::with('submenus')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();
        $portfolio = Portfolio::where('portfolios.portfolio_slug', '=', $portfolio_slug)
            ->first();
        if (!isset($portfolio)) {
            abort(404);
        }
        if (isset($portfolio)) {
            $portfolio_content = PortfolioContent::where('portfolio_id', $portfolio->id)->first();
            $portfolio_detail_section = PortfolioDetailSection::where('portfolio_id', $portfolio->id)->first();
            $portfolio_details = PortfolioDetail::where('portfolio_id', $portfolio->id)
                ->orderBy('order', 'asc')
                ->get();
            $portfolio_images = PortfolioImage::where('portfolio_id', $portfolio->id)
                ->orderBy('order', 'asc')
                ->get();
        }
        $portfolio_count_categories = Portfolio::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('portfolios.status', 'published')
            ->groupBy('category_id')
            ->get();
        $recent_portfolios = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolio_categories.language_id', $language->id)
            ->where('portfolio_categories.status', 1)
            ->where('portfolios.status', 'published')
            ->orderBy('portfolios.order', 'desc')
            ->take(3)
            ->get();

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


        return view('frontend.portfolio.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font', 'draft_view',
            'header_info_style1', 'header_image_style1', 'socials', 'external_url', 'contact_info_widget_style1',
            'menus', 'portfolio', 'portfolio_content', 'portfolio_details', 'portfolio_detail_section',
            'portfolio_info', 'portfolio_images', 'portfolio_count_categories', 'recent_portfolios', 'footer_image_style1',
            'site_info', 'footers', 'footer_categories', 'page_builder'));

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_index ($category_name = null) {
        // Default values
        $portfolio_limit = 6;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'portfolio-category-index')->first();

        // URL detection when language changes
        $portfolio_index= PageBuilder::where('page_name', 'portfolio-index')->first();

        // Retrieve models
        $header_info_style1 = HeaderInfo::where('language_id', $language->id)->where('style', 'style1')->first();
        $header_image_style1 = HeaderImage::where('style', 'style1')->first();
        $contact_info_widget_style1 = ContactInfoWidget::where('language_id', $language->id)->where('style', 'style1')->first();
        $socials = Social::where('status', 1)->get();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $menus = Menu::with('submenus')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();

        $portfolio_section_paginate_style = PortfolioSection::where('language_id', $language->id)->first();
        if (isset($portfolio_section_paginate_style)) {
            $portfolio_limit = $portfolio_section_paginate_style->paginate_item;
        }
        $portfolios_paginate_style = Portfolio::join("portfolio_categories",'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolio_categories.language_id', $language->id)
            ->where('portfolios.style', 'style1')
            ->where('portfolio_categories.status', 1)
            ->where('portfolios.status', 'published')
            ->orderBy('portfolios.id', 'desc')
            ->paginate($portfolio_limit);
        $portfolio_count_categories = Portfolio::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('portfolios.status', 'published')
            ->groupBy('category_id')
            ->get();

        $category = PortfolioCategory::where('language_id', $language->id)
            ->where('portfolio_category_slug', '=', $category_name)->first();

            if (count($portfolios_paginate_style) < 1) {
                abort(404);
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


        return view('frontend.portfolio.category-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font',
            'draft_view', 'header_info_style1', 'header_image_style1', 'socials', 'external_url', 'contact_info_widget_style1',
            'menus', 'portfolio_count_categories', 'portfolio_section_paginate_style', 'portfolios_paginate_style',
            'category', 'footer_image_style1', 'site_info', 'footers', 'footer_categories', 'portfolio_index', 'page_builder'));
    }

}
