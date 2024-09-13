<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Category;
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
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show ($slug = null) {

        // Default variable
        $previous = null;
        $next = null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
          list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-detail-show')->first();

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

          $blog_section = BlogSection::where('language_id', $language->id)->first();

          $blog = Blog::where('blogs.slug', '=', $slug)
                ->firstOrFail();

          if (!isset($blog)) {
              abort(404);
          }

            if(isset($blog)){
                // Previous blog
                $previous_id = Blog::where('language_id', $language->id)->where('id', '<', $blog->id)->where('status', 'published')->max('id');
                $previous = Blog::where('id', $previous_id)->first();

                // Next blog
                $next_id = Blog::where('language_id', $language->id)->where('id', '>', $blog->id)->where('status', 'published')->min('id');
                $next = Blog::where('id', $next_id)->first();

                // Update view column
                Blog::find($blog->id)->update(
                    ['view' => $blog->view + 1]
                );
            }

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.view', 'desc')
            ->take(3)
            ->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
            ->groupBy('category_id')
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


        return view('frontend.blog.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'socials', 'external_url', 'contact_info_widget_style1', 'menus', 'recent_posts', 'blog_section', 'blog',
            'blog_count_categories', 'slug', 'previous', 'next', 'header_info_style1', 'header_image_style1',
            'footer_image_style1', 'site_info', 'footers', 'footer_categories', 'page_builder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_index ($category_name = null) {

        // Default variable
        $blog_limit = 6;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-category-index')->first();

        // URL detection when language changes
        $blog_index = PageBuilder::where('page_name', 'blog-index')->first();

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

        $blog_section_paginate_style = BlogSection::where('language_id', $language->id)->first();
        if (isset($blog_section_paginate_style)) {
            $blog_limit = $blog_section_paginate_style->paginate_item;
        }

        $blogs_paginate_style = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.category_slug', '=', $category_name)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.id', 'desc')
            ->paginate($blog_limit);

        $category = Category::where('language_id', $language->id)
            ->where('category_slug', '=', $category_name)->first();

            if (count($blogs_paginate_style) < 1) {
                abort(404);
            }

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.view', 'desc')
            ->take(3)
            ->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
            ->groupBy('category_id')
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


        return view('frontend.blog.category-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'socials', 'external_url', 'contact_info_widget_style1', 'menus', 'recent_posts', 'blog_count_categories',
            'blogs_paginate_style', 'category', 'header_info_style1', 'header_image_style1',
            'footer_image_style1', 'site_info', 'footers', 'footer_categories', 'blog_index', 'page_builder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function tag_index($tag_name = "draft_page")
    {
        // Default variable
        $blog_limit = 6;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-tag-index')->first();

        // URL detection when language changes
        $blog_index = PageBuilder::where('page_name', 'blog-index')->first();

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

        $blog_section_paginate_style = BlogSection::where('language_id', $language->id)->first();
        if (isset($blog_section_paginate_style)) {
            $blog_limit = $blog_section_paginate_style->paginate_item;
        }

        $blogs_paginate_style = Blog::where('status', 'published')
            ->where('tag', 'like', '%'.$tag_name.'%')
            ->whereHas('category', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('id', 'desc')
            ->paginate($blog_limit);

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.view', 'desc')
            ->take(3)
            ->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
            ->groupBy('category_id')
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


        return view('frontend.blog.tag-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font', 'draft_view',
            'socials', 'external_url', 'contact_info_widget_style1', 'menus', 'recent_posts',
            'blog_count_categories', 'blogs_paginate_style', 'tag_name', 'header_info_style1', 'header_image_style1',
            'footer_image_style1', 'site_info', 'footers', 'footer_categories', 'blog_index', 'page_builder'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Default variable
        $blog_limit = 6;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-search-index')->first();

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

        // Search
        $search = $request->get('search');

        $blog_section_paginate_style = BlogSection::where('language_id', $language->id)->first();
        if (isset($blog_section_paginate_style)) {
            $blog_limit = $blog_section_paginate_style->paginate_item;
        }
        $blogs_paginate_style = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.id', 'desc')
            ->paginate($blog_limit);

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

        return view('frontend.blog.search-index', compact ( 'preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font', 'draft_view',
            'socials', 'external_url', 'contact_info_widget_style1', 'menus', 'blogs_paginate_style', 'header_info_style1',
            'header_image_style1', 'footer_image_style1', 'site_info', 'footers', 'footer_categories', 'page_builder'));
    }

}
