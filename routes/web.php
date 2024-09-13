<?php

use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionController;
use App\Http\Controllers\Admin\BreadcrumbImageController;
use App\Http\Controllers\Admin\CallToActionController;
use App\Http\Controllers\Admin\CareerCategoryController;
use App\Http\Controllers\Admin\CareerContentController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CareerSectionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorOptionController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ContactInfoSectionController;
use App\Http\Controllers\Admin\ContactInfoWidgetController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CounterSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DemoModeController;
use App\Http\Controllers\Admin\DraftViewController;
use App\Http\Controllers\Admin\ErrorPageController;
use App\Http\Controllers\Admin\ExternalUrlController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FaqSectionController;
use App\Http\Controllers\Admin\FaviconController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureSectionController;
use App\Http\Controllers\Admin\FontController;
use App\Http\Controllers\Admin\FooterCategoryController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\FooterImageController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\GalleryImageSectionController;
use App\Http\Controllers\Admin\GoogleAnalyticController;
use App\Http\Controllers\Admin\GoToSiteUrlController;
use App\Http\Controllers\Admin\HeaderImageController;
use App\Http\Controllers\Admin\HeaderInfoController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\HistorySectionController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LanguageKeywordController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PageNameController;
use App\Http\Controllers\Admin\PanelImageController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PlanSectionController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioContentController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioDetailController;
use App\Http\Controllers\Admin\PortfolioDetailSectionController;
use App\Http\Controllers\Admin\PortfolioImageController;
use App\Http\Controllers\Admin\PortfolioSectionController;
use App\Http\Controllers\Admin\PreloaderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuickAccessButtonController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceFeatureController;
use App\Http\Controllers\Admin\ServiceFeatureSectionController;
use App\Http\Controllers\Admin\ServiceInfoController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SiteUrlController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\SubmenuController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\SubscribeSectionController;
use App\Http\Controllers\Admin\TawkToController;
use App\Http\Controllers\Admin\TeamCategoryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamSectionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestimonialSectionController;
use App\Http\Controllers\Admin\VideoSectionController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\WhyChooseSectionController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Admin\WorkProcessSectionController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Admin\PageBuilder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Livewire::setScriptRoute(function ($handle) {
    return Route::get('public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('public/livewire/update', $handle);
});

if (Schema::hasTable('page_builders')) {

    $all_page_uris = PageBuilder::pluck('page_uri')->toArray();


    $service_detail_show = PageBuilder::where('page_name', 'service-detail-show')->first();
    $service_category_index = PageBuilder::where('page_name', 'service-category-index')->first();

    $team_category_index = PageBuilder::where('page_name', 'team-category-index')->first();

    $portfolio_detail_show = PageBuilder::where('page_name', 'portfolio-detail-show')->first();
    $portfolio_category_index = PageBuilder::where('page_name', 'portfolio-category-index')->first();

    $career_detail_show = PageBuilder::where('page_name', 'career-detail-show')->first();

    $blog_detail_show = PageBuilder::where('page_name', 'blog-detail-show')->first();
    $blog_category_index = PageBuilder::where('page_name', 'blog-category-index')->first();
    $blog_tag_index = PageBuilder::where('page_name', 'blog-tag-index')->first();
    $blog_search_index = PageBuilder::where('page_name', 'blog-search-index')->first();

    $page_detail_show = PageBuilder::where('page_name', 'page-detail-show')->first();

}


// Start Site Frontend Route
Route::get('{page_uri?}', [HomeController::class, 'page_index'])->name('page-index')->middleware('XSS');

if (isset($service_detail_show)) {
    Route::get($service_detail_show->page_uri.'/{service_slug?}', [\App\Http\Controllers\Frontend\ServiceController::class, 'show'])
        ->name('default-service-detail-show')->middleware('XSS');
}
if (isset($service_category_index)) {
    Route::get($service_category_index->page_uri.'/{category_name?}', [\App\Http\Controllers\Frontend\ServiceController::class, 'category_index'])
        ->name('default-service-category-index')->middleware('XSS');
}

if (isset($team_category_index)) {
    Route::get($team_category_index->page_uri.'/{category_name?}', [\App\Http\Controllers\Frontend\TeamController::class, 'category_index'])
        ->name('default-team-category-index')->middleware('XSS');
}

if (isset($portfolio_detail_show)) {
    Route::get($portfolio_detail_show->page_uri.'/{portfolio_slug?}', [\App\Http\Controllers\Frontend\PortfolioController::class, 'show'])
        ->name('default-portfolio-detail-show')->middleware('XSS');
}
if (isset($portfolio_category_index)) {
    Route::get($portfolio_category_index->page_uri.'/{category_name?}', [\App\Http\Controllers\Frontend\PortfolioController::class, 'category_index'])
        ->name('default-portfolio-category-index')->middleware('XSS');
}

if (isset($career_detail_show)) {
    Route::get($career_detail_show->page_uri.'/{career_slug?}', [\App\Http\Controllers\Frontend\CareerController::class, 'show'])
        ->name('default-career-detail-show')->middleware('XSS');
}

if (isset($blog_detail_show)) {
    Route::get($blog_detail_show->page_uri.'/{slug?}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])
        ->name('default-blog-detail-show')->middleware('XSS');
}
if (isset($blog_category_index)) {
    Route::get($blog_category_index->page_uri.'/{category_name?}', [\App\Http\Controllers\Frontend\BlogController::class, 'category_index'])
        ->name('default-blog-category-index')->middleware('XSS');
}
if (isset($blog_tag_index)) {
    Route::get($blog_tag_index->page_uri.'/{tag_name?}', [\App\Http\Controllers\Frontend\BlogController::class, 'tag_index'])
        ->name('default-blog-tag-index')->middleware('XSS');
}
if (isset($blog_search_index)) {
    Route::post($blog_search_index->page_uri, [\App\Http\Controllers\Frontend\BlogController::class, 'search'])
        ->name('default-blog-search-index')->middleware('XSS');
}

if (isset($page_detail_show)) {
    Route::get($page_detail_show->page_uri.'/{page_slug?}', [\App\Http\Controllers\Frontend\PageController::class, 'show'])
        ->name('default-page-detail-show')->middleware('XSS');
}
// End Site Frontend Route

// Start Site Admin Panel Route
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'role:super-admin'])->prefix('admin')->group(function () {
    Route::get('admin-role', [AdminRoleController::class, 'index'])->name('admin-role.index');
    Route::get('admin-role/create', [AdminRoleController::class, 'create'])->name('admin-role.create');
    Route::post('admin-role', [AdminRoleController::class, 'store'])->name('admin-role.store');
    Route::get('admin-role/{id}/edit', [AdminRoleController::class, 'edit'])->name('admin-role.edit');
    Route::put('admin-role/{id}', [AdminRoleController::class, 'update'])->name('admin-role.update');
    Route::delete('admin-role/{id}', [AdminRoleController::class, 'destroy'])->name('admin-role.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'role:super-admin'])->prefix('admin')->group(function () {
    Route::get('admin-user', [AdminUserController::class, 'index'])->name('admin-user.index');
    Route::get('admin-user/create', [AdminUserController::class, 'create'])->name('admin-user.create');
    Route::post('admin-user', [AdminUserController::class, 'store'])->name('admin-user.store');
    Route::get('admin-user/{id}/edit', [AdminUserController::class, 'edit'])->name('admin-user.edit');
    Route::put('admin-user/{id}', [AdminUserController::class, 'update'])->name('admin-user.update');
    Route::delete('admin-user/{id}', [AdminUserController::class, 'destroy'])->name('admin-user.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:upload check'])->prefix('admin')->group(function () {
    Route::get('photo/create', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('photo', [PhotoController::class, 'store'])->name('photo.store');
    Route::get('photo/{id}/edit', [PhotoController::class, 'edit'])->name('photo.edit');
    Route::put('photo/{id}', [PhotoController::class, 'update'])->name('photo.update');
    Route::delete('photo/{id}', [PhotoController::class, 'destroy'])->name('photo.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:page builder check'])->prefix('admin')->group(function () {
    Route::get('page-name/create', [PageNameController::class, 'create'])->name('page-name.create');
    Route::post('page-name', [PageNameController::class, 'store'])->name('page-name.store');
    Route::get('page-name/{id}/edit', [PageNameController::class, 'edit'])->name('page-name.edit');
    Route::put('page-name/{id}', [PageNameController::class, 'update'])->name('page-name.update');
    Route::delete('page-name/{id}', [PageNameController::class, 'destroy'])->name('page-name.destroy');
    Route::delete('page-name-checked', [PageNameController::class, 'destroy_checked'])->name('page-name.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:page builder check'])->prefix('admin')->group(function () {
    Route::get('page-builder/create', [PageBuilderController::class, 'create'])->name('page-builder.create');
    Route::post('page-builder', [PageBuilderController::class, 'store'])->name('page-builder.store');
    Route::get('page-builder/{id}/edit', [PageBuilderController::class, 'edit'])->name('page-builder.edit');
    Route::put('page-builder/{id}', [PageBuilderController::class, 'update'])->name('page-builder.update');
    Route::delete('page-builder/{id}', [PageBuilderController::class, 'destroy'])->name('page-builder.destroy');
    Route::delete('page-builder-checked', [PageBuilderController::class, 'destroy_checked'])->name('page-builder.destroy_checked');
    Route::patch('social/default-page-update/{id}', [PageBuilderController::class, 'default_page_update'])->name('page-builder.default_page_update');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:menu check'])->prefix('admin')->group(function () {
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::delete('menu-checked', [MenuController::class, 'destroy_checked'])->name('menu.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:menu check'])->prefix('admin')->group(function () {
    Route::get('submenu/create', [SubmenuController::class, 'create'])->name('submenu.create');
    Route::post('submenu', [SubmenuController::class, 'store'])->name('submenu.store');
    Route::get('submenu/{id}/edit', [SubmenuController::class, 'edit'])->name('submenu.edit');
    Route::put('submenu/{id}', [SubmenuController::class, 'update'])->name('submenu.update');
    Route::delete('submenu/{id}', [SubmenuController::class, 'destroy'])->name('submenu.destroy');
    Route::delete('submenu-checked', [SubmenuController::class, 'destroy_checked'])->name('submenu.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:subscribe check'])->prefix('admin')->group(function () {
    Route::get('subscribe/create', [SubscribeController::class, 'create'])->name('subscribe.create');
    Route::post('subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');
    Route::delete('subscribe/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('favicon/create', [FaviconController::class, 'create'])->name('favicon.create');
    Route::post('favicon', [FaviconController::class, 'store'])->name('favicon.store');
    Route::put('favicon/{id}', [FaviconController::class, 'update'])->name('favicon.update');
    Route::delete('favicon/image/{id}', [FaviconController::class, 'destroy_image'])->name('favicon.destroy_image');
    Route::delete('favicon/{id}', [FaviconController::class, 'destroy'])->name('favicon.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('header-image/create/{style?}', [HeaderImageController::class, 'create'])->name('header-image.create');
    Route::post('header-image', [HeaderImageController::class, 'store'])->name('header-image.store');
    Route::put('header-image/{id}', [HeaderImageController::class, 'update'])->name('header-image.update');
    Route::delete('header-image/image/{id}', [HeaderImageController::class, 'destroy_image'])->name('header-image.destroy_image');
    Route::delete('header-image/image_2/{id}', [HeaderImageController::class, 'destroy_image_2'])->name('header-image.destroy_image_2');
    Route::delete('header-image/{id}', [HeaderImageController::class, 'destroy'])->name('header-image.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('footer-image/create/{style?}', [FooterImageController::class, 'create'])->name('footer-image.create');
    Route::post('footer-image', [FooterImageController::class, 'store'])->name('footer-image.store');
    Route::put('footer-image/{id}', [FooterImageController::class, 'update'])->name('footer-image.update');
    Route::delete('footer-image/image/{id}', [FooterImageController::class, 'destroy_image'])->name('footer-image.destroy_image');
    Route::delete('footer-image/{id}', [FooterImageController::class, 'destroy'])->name('footer-image.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('panel-image/create', [PanelImageController::class, 'create'])->name('panel-image.create');
    Route::post('panel-image', [PanelImageController::class, 'store'])->name('panel-image.store');
    Route::put('panel-image/{id}', [PanelImageController::class, 'update'])->name('panel-image.update');
    Route::delete('panel-image/image/{id}', [PanelImageController::class, 'destroy_image'])->name('panel-image.destroy_image');
    Route::delete('panel-image/image_2/{id}', [PanelImageController::class, 'destroy_image_2'])->name('panel-image.destroy_image_2');
    Route::delete('panel-image/{id}', [PanelImageController::class, 'destroy'])->name('panel-image.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('external-url/create', [ExternalUrlController::class, 'create'])->name('external-url.create');
    Route::post('external-url', [ExternalUrlController::class, 'store'])->name('external-url.store');
    Route::put('external-url/{id}', [ExternalUrlController::class, 'update'])->name('external-url.update');
    Route::delete('external-url/{id}', [ExternalUrlController::class, 'destroy'])->name('external-url.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('contact-info-widget/create/{style?}', [ContactInfoWidgetController::class, 'create'])->name('contact-info-widget.create');
    Route::post('contact-info-widget', [ContactInfoWidgetController::class, 'store'])->name('contact-info-widget.store');
    Route::put('contact-info-widget/{id}', [ContactInfoWidgetController::class, 'update'])->name('contact-info-widget.update');
    Route::delete('contact-info-widget/{id}', [ContactInfoWidgetController::class, 'destroy'])->name('contact-info-widget.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('breadcrumb-image/create', [BreadcrumbImageController::class, 'create'])->name('breadcrumb-image.create');
    Route::post('breadcrumb-image', [BreadcrumbImageController::class, 'store'])->name('breadcrumb-image.store');
    Route::put('breadcrumb-image/{id}', [BreadcrumbImageController::class, 'update'])->name('breadcrumb-image.update');
    Route::delete('breadcrumb-image/image/{id}', [BreadcrumbImageController::class, 'destroy_image'])->name('breadcrumb-image.destroy_image');
    Route::delete('breadcrumb-image/{id}', [BreadcrumbImageController::class, 'destroy'])->name('breadcrumb-image.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('header-info/create/{style?}', [HeaderInfoController::class, 'create'])->name('header-info.create');
    Route::post('header-info', [HeaderInfoController::class, 'store'])->name('header-info.store');
    Route::put('header-info/{id}', [HeaderInfoController::class, 'update'])->name('header-info.update');
    Route::delete('header-info/{id}', [HeaderInfoController::class, 'destroy'])->name('header-info.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('site-info/create', [SiteInfoController::class, 'create'])->name('site-info.create');
    Route::post('site-info', [SiteInfoController::class, 'store'])->name('site-info.store');
    Route::put('site-info/{id}', [SiteInfoController::class, 'update'])->name('site-info.update');
    Route::delete('site-info/{id}', [SiteInfoController::class, 'destroy'])->name('site-info.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
    Route::post('social', [SocialController::class, 'store'])->name('social.store');
    Route::get('social/{id}/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::put('social/{id}', [SocialController::class, 'update'])->name('social.update');
    Route::patch('social/update_status/{id}', [SocialController::class, 'update_status'])->name('social.update_status');
    Route::delete('social/{id}', [SocialController::class, 'destroy'])->name('social.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
    Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
    Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
    Route::delete('seo/{id}', [SeoController::class, 'destroy'])->name('seo.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('preloader/create', [PreloaderController::class, 'create'])->name('preloader.create');
    Route::post('preloader', [PreloaderController::class, 'store'])->name('preloader.store');
    Route::put('preloader/{id}', [PreloaderController::class, 'update'])->name('preloader.update');
    Route::delete('preloader/{id}', [PreloaderController::class, 'destroy'])->name('preloader.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('google-analytic/create', [GoogleAnalyticController::class, 'create'])->name('google-analytic.create');
    Route::post('google-analytic', [GoogleAnalyticController::class, 'store'])->name('google-analytic.store');
    Route::put('google-analytic/{id}', [GoogleAnalyticController::class, 'update'])->name('google-analytic.update');
    Route::delete('google-analytic/{id}', [GoogleAnalyticController::class, 'destroy'])->name('google-analytic.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('tawk-to/create', [TawkToController::class, 'create'])->name('tawk-to.create');
    Route::post('tawk-to', [TawkToController::class, 'store'])->name('tawk-to.store');
    Route::put('tawk-to/{id}', [TawkToController::class, 'update'])->name('tawk-to.update');
    Route::delete('tawk-to/{id}', [TawkToController::class, 'destroy'])->name('tawk-to.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('quick-access/create', [QuickAccessButtonController::class, 'create'])->name('quick-access.create');
    Route::post('quick-access', [QuickAccessButtonController::class, 'store'])->name('quick-access.store');
    Route::put('quick-access/{id}', [QuickAccessButtonController::class, 'update'])->name('quick-access.update');

    Route::post('quick-access-bottom', [QuickAccessButtonController::class, 'store_bottom'])->name('quick-access-bottom.store');
    Route::put('quick-access-bottom/{id}', [QuickAccessButtonController::class, 'update_bottom'])->name('quick-access-bottom.update');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('color-option/create', [ColorOptionController::class, 'create'])->name('color-option.create');
    Route::post('color-option', [ColorOptionController::class, 'store'])->name('color-option.store');
    Route::put('color-option/{id}', [ColorOptionController::class, 'update'])->name('color-option.update');

    Route::post('customize-color-option', [ColorOptionController::class, 'customize-store'])->name('customize-color-option.store');
    Route::put('customize-color-option/{id}', [ColorOptionController::class, 'customize-update'])->name('customize-color-option.update');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('font/create', [FontController::class, 'create'])->name('font.create');
    Route::post('font', [FontController::class, 'store'])->name('font.store');
    Route::put('font/{id}', [FontController::class, 'update'])->name('font.update');
    Route::delete('font/{id}', [FontController::class, 'destroy'])->name('font.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:setting check'])->prefix('admin')->group(function () {
    Route::get('draft-view/create', [DraftViewController::class, 'create'])->name('draft-view.create');
    Route::post('draft-view', [DraftViewController::class, 'store'])->name('draft-view.store');
    Route::put('draft-view/{id}', [DraftViewController::class, 'update'])->name('draft-view.update');
    Route::delete('draft-view/{id}', [DraftViewController::class, 'destroy'])->name('draft-view.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:section check'])->prefix('admin')->group(function () {
    Route::get('banner/create/{style?}', [BannerController::class, 'create'])->name('banner.create');
    Route::post('banner', [BannerController::class, 'store'])->name('banner.store');
    Route::put('banner/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('banner/image/{id}', [BannerController::class, 'destroy_image'])->name('banner.destroy_image');
    Route::delete('banner/image_2/{id}', [BannerController::class, 'destroy_image_2'])->name('banner.destroy_image_2');
    Route::delete('banner/image_3/{id}', [BannerController::class, 'destroy_image_3'])->name('banner.destroy_image_3');
    Route::delete('banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:section check'])->prefix('admin')->group(function () {
    Route::get('about/create/{style?}', [AboutSectionController::class, 'create'])->name('about.create');
    Route::post('about', [AboutSectionController::class, 'store'])->name('about.store');
    Route::put('about/{id}', [AboutSectionController::class, 'update'])->name('about.update');
    Route::delete('about/image/{id}', [AboutSectionController::class, 'destroy_image'])->name('about.destroy_image');
    Route::delete('about/image_2/{id}', [AboutSectionController::class, 'destroy_image_2'])->name('about.destroy_image_2');
    Route::delete('about/{id}', [AboutSectionController::class, 'destroy'])->name('about.destroy');

    Route::post('about-feature', [AboutSectionController::class, 'store_feature'])->name('about.store_feature');
    Route::get('about-feature/{id}/edit', [AboutSectionController::class, 'edit_feature'])->name('about.edit_feature');
    Route::put('about-feature/{id}', [AboutSectionController::class, 'update_feature'])->name('about.update_feature');
    Route::delete('about-feature/{id}', [AboutSectionController::class, 'destroy_feature'])->name('about.destroy_feature');
    Route::delete('about-feature-checked', [AboutSectionController::class, 'destroy_feature_checked'])->name('about.destroy_feature_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('history/create/{style?}', [HistoryController::class, 'create'])->name('history.create');
    Route::post('history', [HistoryController::class, 'store'])->name('history.store');
    Route::get('history/{id}/edit', [HistoryController::class, 'edit'])->name('history.edit');
    Route::put('history/{id}', [HistoryController::class, 'update'])->name('history.update');
    Route::delete('history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');
    Route::delete('history-checked', [HistoryController::class, 'destroy_checked'])->name('history.destroy_checked');
    Route::delete('history/image/{id}', [HistoryController::class, 'destroy_image'])->name('history.destroy_image');

    Route::post('history-section', [HistorySectionController::class, 'store'])->name('history-section.store');
    Route::put('history-section/{id}', [HistorySectionController::class, 'update'])->name('history-section.update');
    Route::delete('history-section/{id}', [HistorySectionController::class, 'destroy'])->name('history-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('feature/create/{style?}', [FeatureController::class, 'create'])->name('feature.create');
    Route::post('feature', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('feature/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::put('feature/{id}', [FeatureController::class, 'update'])->name('feature.update');
    Route::delete('feature/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');
    Route::delete('feature-checked', [FeatureController::class, 'destroy_checked'])->name('feature.destroy_checked');
    Route::delete('feature/image/{id}', [FeatureController::class, 'destroy_image'])->name('feature.destroy_image');

    Route::post('feature-section', [FeatureSectionController::class, 'store'])->name('feature-section.store');
    Route::put('feature-section/{id}', [FeatureSectionController::class, 'update'])->name('feature-section.update');
    Route::delete('feature-section/image/{id}', [FeatureSectionController::class, 'destroy_image'])->name('feature-section.destroy_image');
    Route::delete('feature-section/{id}', [FeatureSectionController::class, 'destroy'])->name('feature-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:service check'])->prefix('admin')->group(function () {
    Route::get('service-category/create', [ServiceCategoryController::class, 'create'])->name('service-category.create');
    Route::post('service-category', [ServiceCategoryController::class, 'store'])->name('service-category.store');
    Route::get('service-category/{id}/edit', [ServiceCategoryController::class, 'edit'])->name('service-category.edit');
    Route::put('service-category/{id}', [ServiceCategoryController::class, 'update'])->name('service-category.update');
    Route::delete('service-category/{id}', [ServiceCategoryController::class, 'destroy'])->name('service-category.destroy');
    Route::delete('service-category-checked', [ServiceCategoryController::class, 'destroy_checked'])->name('service-category.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:service check'])->prefix('admin')->group(function () {
    Route::get('service/{style?}', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/create/{style?}', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('service/image/{id}', [ServiceController::class, 'destroy_image'])->name('service.destroy_image');
    Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::delete('service/image/{id}', [ServiceController::class, 'destroy_image'])->name('service.destroy_image');
    Route::delete('service/image_2/{id}', [ServiceController::class, 'destroy_image_2'])->name('service.destroy_image_2');
    Route::delete('service-checked', [ServiceController::class, 'destroy_checked'])->name('service.destroy_checked');

    Route::post('service-section', [ServiceSectionController::class, 'store'])->name('service-section.store');
    Route::put('service-section/{id}', [ServiceSectionController::class, 'update'])->name('service-section.update');
    Route::delete('service-section/{id}', [ServiceSectionController::class, 'destroy'])->name('service-section.destroy');

    Route::get('service-content/{id}/create', [ServiceContentController::class, 'create'])->name('service-content.create');
    Route::post('service-content', [ServiceContentController::class, 'store'])->name('service-content.store');
    Route::put('service-content/{id}', [ServiceContentController::class, 'update'])->name('service-content.update');
    Route::delete('service-content/image/{id}', [ServiceContentController::class, 'destroy_image'])->name('service-content.destroy_image');
    Route::delete('service-content/{id}', [ServiceContentController::class, 'destroy'])->name('service-content.destroy');

    Route::get('service-info/{id}/create', [ServiceInfoController::class, 'create'])->name('service-info.create');
    Route::post('service-info', [ServiceInfoController::class, 'store'])->name('service-info.store');
    Route::put('service-info/{id}', [ServiceInfoController::class, 'update'])->name('service-info.update');
    Route::delete('service-info/image/{id}', [ServiceInfoController::class, 'destroy_image'])->name('service-info.destroy_image');
    Route::delete('service-info/{id}', [ServiceInfoController::class, 'destroy'])->name('service-info.destroy');

    Route::get('service-feature/{id}/create', [ServiceFeatureController::class, 'create'])->name('service-feature.create');
    Route::post('service-feature/{id}', [ServiceFeatureController::class, 'store'])->name('service-feature.store');
    Route::get('service-feature/{service_id}/{id}/edit', [ServiceFeatureController::class, 'edit'])->name('service-feature.edit');
    Route::put('service-feature/{id}', [ServiceFeatureController::class, 'update'])->name('service-feature.update');
    Route::delete('service-feature/{id}', [ServiceFeatureController::class, 'destroy'])->name('service-feature.destroy');
    Route::delete('service-feature/image/{id}', [ServiceFeatureController::class, 'destroy_image'])->name('service-feature.destroy_image');
    Route::delete('service-feature-checked/{id}', [ServiceFeatureController::class, 'destroy_checked'])->name('service-feature.destroy_checked');

    Route::post('service-feature-section', [ServiceFeatureSectionController::class, 'store'])->name('service-feature-section.store');
    Route::put('service-feature-section/{id}', [ServiceFeatureSectionController::class, 'update'])->name('service-feature-section.update');
    Route::delete('service-feature-section/{id}', [ServiceFeatureSectionController::class, 'destroy'])->name('service-feature-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('counter/create/{style?}', [CounterController::class, 'create'])->name('counter.create');
    Route::post('counter', [CounterController::class, 'store'])->name('counter.store');
    Route::get('counter/{id}/edit', [CounterController::class, 'edit'])->name('counter.edit');
    Route::put('counter/{id}', [CounterController::class, 'update'])->name('counter.update');
    Route::delete('counter/{id}', [CounterController::class, 'destroy'])->name('counter.destroy');
    Route::delete('counter-checked', [CounterController::class, 'destroy_checked'])->name('counter.destroy_checked');

    Route::post('counter-section', [CounterSectionController::class, 'store'])->name('counter-section.store');
    Route::put('counter-section/{id}', [CounterSectionController::class, 'update'])->name('counter-section.update');
    Route::delete('counter-section/{id}', [CounterSectionController::class, 'destroy'])->name('counter-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('work-process/create/{style?}', [WorkProcessController::class, 'create'])->name('work-process.create');
    Route::post('work-process', [WorkProcessController::class, 'store'])->name('work-process.store');
    Route::get('work-process/{id}/edit', [WorkProcessController::class, 'edit'])->name('work-process.edit');
    Route::put('work-process/{id}', [WorkProcessController::class, 'update'])->name('work-process.update');
    Route::delete('work-process/{id}', [WorkProcessController::class, 'destroy'])->name('work-process.destroy');
    Route::delete('work-process-checked', [WorkProcessController::class, 'destroy_checked'])->name('work-process.destroy_checked');
    Route::delete('work-process/image/{id}', [WorkProcessController::class, 'destroy_image'])->name('work-process.destroy_image');

    Route::post('work-process-section', [WorkProcessSectionController::class, 'store'])->name('work-process-section.store');
    Route::put('work-process-section/{id}', [WorkProcessSectionController::class, 'update'])->name('work-process-section.update');
    Route::delete('work-process-section/image/{id}', [WorkProcessSectionController::class, 'destroy_image'])->name('work-process-section.destroy_image');
    Route::delete('work-process-section/{id}', [WorkProcessSectionController::class, 'destroy'])->name('work-process-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('why-choose/create/{style?}', [WhyChooseController::class, 'create'])->name('why-choose.create');
    Route::post('why-choose', [WhyChooseController::class, 'store'])->name('why-choose.store');
    Route::get('why-choose/{id}/edit', [WhyChooseController::class, 'edit'])->name('why-choose.edit');
    Route::put('why-choose/{id}', [WhyChooseController::class, 'update'])->name('why-choose.update');
    Route::delete('why-choose/{id}', [WhyChooseController::class, 'destroy'])->name('why-choose.destroy');
    Route::delete('why-choose-checked', [WhyChooseController::class, 'destroy_checked'])->name('why-choose.destroy_checked');

    Route::post('why-choose-section', [WhyChooseSectionController::class, 'store'])->name('why-choose-section.store');
    Route::put('why-choose-section/{id}', [WhyChooseSectionController::class, 'update'])->name('why-choose-section.update');
    Route::delete('why-choose-section/image/{id}', [WhyChooseSectionController::class, 'destroy_image'])->name('why-choose-section.destroy_image');
    Route::delete('why-choose-section/{id}', [WhyChooseSectionController::class, 'destroy'])->name('why-choose-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:section check'])->prefix('admin')->group(function () {
    Route::get('call-to-action/create/{style?}', [CallToActionController::class, 'create'])->name('call-to-action.create');
    Route::post('call-to-action', [CallToActionController::class, 'store'])->name('call-to-action.store');
    Route::put('call-to-action/{id}', [CallToActionController::class, 'update'])->name('call-to-action.update');
    Route::delete('call-to-action/{id}', [CallToActionController::class, 'destroy'])->name('call-to-action.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:portfolio check'])->prefix('admin')->group(function () {
    Route::get('portfolio-category/create', [PortfolioCategoryController::class, 'create'])->name('portfolio-category.create');
    Route::post('portfolio-category', [PortfolioCategoryController::class, 'store'])->name('portfolio-category.store');
    Route::get('portfolio-category/{id}/edit', [PortfolioCategoryController::class, 'edit'])->name('portfolio-category.edit');
    Route::put('portfolio-category/{id}', [PortfolioCategoryController::class, 'update'])->name('portfolio-category.update');
    Route::delete('portfolio-category/{id}', [PortfolioCategoryController::class, 'destroy'])->name('portfolio-category.destroy');
    Route::delete('portfolio-category-checked', [PortfolioCategoryController::class, 'destroy_checked'])->name('portfolio-category.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:portfolio check'])->prefix('admin')->group(function () {
    Route::get('portfolio/{style?}', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('portfolio/create/{style?}', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('portfolio/image/{id}', [PortfolioController::class, 'destroy_image'])->name('portfolio.destroy_image');
    Route::delete('portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::delete('portfolio/image/{id}', [PortfolioController::class, 'destroy_image'])->name('portfolio.destroy_image');
    Route::delete('portfolio-checked', [PortfolioController::class, 'destroy_checked'])->name('portfolio.destroy_checked');

    Route::post('portfolio-section', [PortfolioSectionController::class, 'store'])->name('portfolio-section.store');
    Route::put('portfolio-section/{id}', [PortfolioSectionController::class, 'update'])->name('portfolio-section.update');
    Route::delete('portfolio-section/{id}', [PortfolioSectionController::class, 'destroy'])->name('portfolio-section.destroy');

    Route::get('portfolio-content/{id}/create', [PortfolioContentController::class, 'create'])->name('portfolio-content.create');
    Route::post('portfolio-content', [PortfolioContentController::class, 'store'])->name('portfolio-content.store');
    Route::put('portfolio-content/{id}', [PortfolioContentController::class, 'update'])->name('portfolio-content.update');
    Route::delete('portfolio-content/image/{id}', [PortfolioContentController::class, 'destroy_image'])->name('portfolio-content.destroy_image');
    Route::delete('portfolio-content/{id}', [PortfolioContentController::class, 'destroy'])->name('portfolio-content.destroy');

    Route::get('portfolio-detail/{id}/create', [PortfolioDetailController::class, 'create'])->name('portfolio-detail.create');
    Route::post('portfolio-detail/{id}', [PortfolioDetailController::class, 'store'])->name('portfolio-detail.store');
    Route::get('portfolio-detail/{portfolio_id}/{id}/edit', [PortfolioDetailController::class, 'edit'])->name('portfolio-detail.edit');
    Route::put('portfolio-detail/{id}', [PortfolioDetailController::class, 'update'])->name('portfolio-detail.update');
    Route::delete('portfolio-detail/{id}', [PortfolioDetailController::class, 'destroy'])->name('portfolio-detail.destroy');
    Route::delete('portfolio-detail-checked/{id}', [PortfolioDetailController::class, 'destroy_checked'])->name('portfolio-detail.destroy_checked');

    Route::post('portfolio-detail-section', [PortfolioDetailSectionController::class, 'store'])->name('portfolio-detail-section.store');
    Route::put('portfolio-detail-section/{id}', [PortfolioDetailSectionController::class, 'update'])->name('portfolio-detail-section.update');
    Route::delete('portfolio-detail-section/{id}', [PortfolioDetailSectionController::class, 'destroy'])->name('portfolio-detail-section.destroy');

    Route::get('portfolio-image/{id}/create', [PortfolioImageController::class, 'create'])->name('portfolio-image.create');
    Route::post('portfolio-image/{id}', [PortfolioImageController::class, 'store'])->name('portfolio-image.store');
    Route::get('portfolio-image/{portfolio_id}/{id}/edit', [PortfolioImageController::class, 'edit'])->name('portfolio-image.edit');
    Route::put('portfolio-image/{id}', [PortfolioImageController::class, 'update'])->name('portfolio-image.update');
    Route::delete('portfolio-image/{id}', [PortfolioImageController::class, 'destroy'])->name('portfolio-image.destroy');
    Route::delete('portfolio-image-checked/{id}', [PortfolioImageController::class, 'destroy_checked'])->name('portfolio-image.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:team check'])->prefix('admin')->group(function () {
    Route::get('team-category/create', [TeamCategoryController::class, 'create'])->name('team-category.create');
    Route::post('team-category', [TeamCategoryController::class, 'store'])->name('team-category.store');
    Route::get('team-category/{id}/edit', [TeamCategoryController::class, 'edit'])->name('team-category.edit');
    Route::put('team-category/{id}', [TeamCategoryController::class, 'update'])->name('team-category.update');
    Route::delete('team-category/{id}', [TeamCategoryController::class, 'destroy'])->name('team-category.destroy');
    Route::delete('team-category-checked', [TeamCategoryController::class, 'destroy_checked'])->name('team-category.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:team check'])->prefix('admin')->group(function () {
    Route::get('team/{style?}', [TeamController::class, 'index'])->name('team.index');
    Route::get('team/create/{style?}', [TeamController::class, 'create'])->name('team.create');
    Route::post('team', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('team/image/{id}', [TeamController::class, 'destroy_image'])->name('team.destroy_image');
    Route::delete('team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::delete('team/image/{id}', [TeamController::class, 'destroy_image'])->name('team.destroy_image');
    Route::delete('team-checked', [TeamController::class, 'destroy_checked'])->name('team.destroy_checked');

    Route::post('team-section', [TeamSectionController::class, 'store'])->name('team-section.store');
    Route::put('team-section/{id}', [TeamSectionController::class, 'update'])->name('team-section.update');
    Route::delete('team-section/{id}', [TeamSectionController::class, 'destroy'])->name('team-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:career check'])->prefix('admin')->group(function () {
    Route::get('career-category/create', [CareerCategoryController::class, 'create'])->name('career-category.create');
    Route::post('career-category', [CareerCategoryController::class, 'store'])->name('career-category.store');
    Route::get('career-category/{id}/edit', [CareerCategoryController::class, 'edit'])->name('career-category.edit');
    Route::put('career-category/{id}', [CareerCategoryController::class, 'update'])->name('career-category.update');
    Route::delete('career-category/{id}', [CareerCategoryController::class, 'destroy'])->name('career-category.destroy');
    Route::delete('career-category-checked', [CareerCategoryController::class, 'destroy_checked'])->name('career-category.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:career check'])->prefix('admin')->group(function () {
    Route::get('career/{style?}', [CareerController::class, 'index'])->name('career.index');
    Route::get('career/create/{style?}', [CareerController::class, 'create'])->name('career.create');
    Route::post('career', [CareerController::class, 'store'])->name('career.store');
    Route::get('career/{id}/edit', [CareerController::class, 'edit'])->name('career.edit');
    Route::put('career/{id}', [CareerController::class, 'update'])->name('career.update');
    Route::delete('career/image/{id}', [CareerController::class, 'destroy_image'])->name('career.destroy_image');
    Route::delete('career/{id}', [CareerController::class, 'destroy'])->name('career.destroy');
    Route::delete('career/image/{id}', [CareerController::class, 'destroy_image'])->name('career.destroy_image');
    Route::delete('career-checked', [CareerController::class, 'destroy_checked'])->name('career.destroy_checked');

    Route::post('career-section', [CareerSectionController::class, 'store'])->name('career-section.store');
    Route::put('career-section/{id}', [CareerSectionController::class, 'update'])->name('career-section.update');
    Route::delete('career-section/{id}', [CareerSectionController::class, 'destroy'])->name('career-section.destroy');

    Route::get('career-content/{id}/create', [CareerContentController::class, 'create'])->name('career-content.create');
    Route::post('career-content', [CareerContentController::class, 'store'])->name('career-content.store');
    Route::put('career-content/{id}', [CareerContentController::class, 'update'])->name('career-content.update');
    Route::delete('career-content/image/{id}', [CareerContentController::class, 'destroy_image'])->name('career-content.destroy_image');
    Route::delete('career-content/{id}', [CareerContentController::class, 'destroy'])->name('career-content.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:page check'])->prefix('admin')->group(function () {
    Route::get('page', [PageController::class, 'index'])->name('page.index');
    Route::get('page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('page', [PageController::class, 'store'])->name('page.store');
    Route::get('page/{id}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::put('page/{id}', [PageController::class, 'update'])->name('page.update');
    Route::delete('page/{id}', [PageController::class, 'destroy'])->name('page.destroy');
    Route::delete('page-checked', [PageController::class, 'destroy_checked'])->name('page.destroy_checked');
    Route::delete('page/image/{id}', [PageController::class, 'destroy_image'])->name('page.destroy_image');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('testimonial/create/{style?}', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::delete('testimonial-checked', [TestimonialController::class, 'destroy_checked'])->name('testimonial.destroy_checked');
    Route::delete('testimonial/image/{id}', [TestimonialController::class, 'destroy_image'])->name('testimonial.destroy_image');

    Route::post('testimonial-section', [TestimonialSectionController::class, 'store'])->name('testimonial-section.store');
    Route::put('testimonial-section/{id}', [TestimonialSectionController::class, 'update'])->name('testimonial-section.update');
    Route::delete('testimonial-section/{id}', [TestimonialSectionController::class, 'destroy'])->name('testimonial-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('sponsor/create/{style?}', [SponsorController::class, 'create'])->name('sponsor.create');
    Route::post('sponsor', [SponsorController::class, 'store'])->name('sponsor.store');
    Route::get('sponsor/{id}/edit', [SponsorController::class, 'edit'])->name('sponsor.edit');
    Route::put('sponsor/{id}', [SponsorController::class, 'update'])->name('sponsor.update');
    Route::delete('sponsor/{id}', [SponsorController::class, 'destroy'])->name('sponsor.destroy');
    Route::delete('sponsor-checked', [SponsorController::class, 'destroy_checked'])->name('sponsor.destroy_checked');
    Route::delete('sponsor/image/{id}', [SponsorController::class, 'destroy_image'])->name('sponsor.destroy_image');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:section check'])->prefix('admin')->group(function () {
    Route::get('video/create/{style?}', [VideoSectionController::class, 'create'])->name('video.create');
    Route::post('video', [VideoSectionController::class, 'store'])->name('video.store');
    Route::put('video/{id}', [VideoSectionController::class, 'update'])->name('video.update');
    Route::delete('video/image/{id}', [VideoSectionController::class, 'destroy_image'])->name('video.destroy_image');
    Route::delete('video/{id}', [VideoSectionController::class, 'destroy'])->name('video.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('faq/create/{style?}', [FaqController::class, 'create'])->name('faq.create');
    Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::delete('faq-checked', [FaqController::class, 'destroy_checked'])->name('faq.destroy_checked');

    Route::post('faq-section', [FaqSectionController::class, 'store'])->name('faq-section.store');
    Route::put('faq-section/{id}', [FaqSectionController::class, 'update'])->name('faq-section.update');
    Route::delete('faq-section/image/{id}', [FaqSectionController::class, 'destroy_image'])->name('faq-section.destroy_image');
    Route::delete('faq-section/{id}', [FaqSectionController::class, 'destroy'])->name('faq-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:blog check'])->prefix('admin')->group(function () {
    Route::get('category/create', [CategoryController::class, 'create'])->name('blog-category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('blog-category.store');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('blog-category.edit');
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('blog-category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('blog-category.destroy');
    Route::delete('category-checked', [CategoryController::class, 'destroy_checked'])->name('blog-category.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:blog check'])->prefix('admin')->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::delete('blog-checked', [BlogController::class, 'destroy_checked'])->name('blog.destroy_checked');
    Route::delete('blog/image/{id}', [BlogController::class, 'destroy_image'])->name('blog.destroy_image');
    Route::delete('blog/image_2/{id}', [BlogController::class, 'destroy_image_2'])->name('blog.destroy_image_2');

    Route::post('blog-section', [BlogSectionController::class, 'store'])->name('blog-section.store');
    Route::put('blog-section/{id}', [BlogSectionController::class, 'update'])->name('blog-section.update');
    Route::delete('blog-section/{id}', [BlogSectionController::class, 'destroy'])->name('blog-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('footer-category/create', [FooterCategoryController::class, 'create'])->name('footer-category.create');
    Route::post('footer-category', [FooterCategoryController::class, 'store'])->name('footer-category.store');
    Route::get('footer-category/{id}/edit', [FooterCategoryController::class, 'edit'])->name('footer-category.edit');
    Route::put('footer-category/{id}', [FooterCategoryController::class, 'update'])->name('footer-category.update');
    Route::delete('footer-category/{id}', [FooterCategoryController::class, 'destroy'])->name('footer-category.destroy');
    Route::delete('footer-category-checked', [FooterCategoryController::class, 'destroy_checked'])->name('footer-category.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('footer', [FooterController::class, 'index'])->name('footer.index');
    Route::get('footer/create', [FooterController::class, 'create'])->name('footer.create');
    Route::post('footer', [FooterController::class, 'store'])->name('footer.store');
    Route::get('footer/{id}/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('footer/{id}', [FooterController::class, 'update'])->name('footer.update');
    Route::delete('footer/{id}', [FooterController::class, 'destroy'])->name('footer.destroy');
    Route::delete('footer-checked', [FooterController::class, 'destroy_checked'])->name('footer.destroy_checked');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:plan check'])->prefix('admin')->group(function () {
    Route::get('plan/create', [PlanController::class, 'create'])->name('plan.create');
    Route::post('plan', [PlanController::class, 'store'])->name('plan.store');
    Route::get('plan/{id}/edit', [PlanController::class, 'edit'])->name('plan.edit');
    Route::put('plan/{id}', [PlanController::class, 'update'])->name('plan.update');
    Route::delete('plan/{id}', [PlanController::class, 'destroy'])->name('plan.destroy');
    Route::delete('plan-checked', [PlanController::class, 'destroy_checked'])->name('plan.destroy_checked');

    Route::post('plan-section', [PlanSectionController ::class, 'store'])->name('plan-section.store');
    Route::put('plan-section/{id}', [PlanSectionController ::class, 'update'])->name('plan-section.update');
    Route::delete('plan-section/{id}', [PlanSectionController::class, 'destroy'])->name('plan-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:section check'])->prefix('admin')->group(function () {
    Route::get('subscribe-section/create/{style?}', [SubscribeSectionController::class, 'create'])->name('subscribe-section.create');
    Route::post('subscribe-section', [SubscribeSectionController::class, 'store'])->name('subscribe-section.store');
    Route::put('subscribe-section/{id}', [SubscribeSectionController::class, 'update'])->name('subscribe-section.update');
    Route::delete('subscribe-section/{id}', [SubscribeSectionController::class, 'destroy'])->name('subscribe-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:gallery check'])->prefix('admin')->group(function () {
    Route::get('gallery', [GalleryImageController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [GalleryImageController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [GalleryImageController::class, 'store'])->name('gallery.store');
    Route::get('gallery/{id}/edit', [GalleryImageController::class, 'edit'])->name('gallery.edit');
    Route::put('gallery/{id}', [GalleryImageController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{id}', [GalleryImageController::class, 'destroy'])->name('gallery.destroy');
    Route::delete('gallery-checked', [GalleryImageController::class, 'destroy_checked'])->name('gallery.destroy_checked');
    Route::delete('gallery/image/{id}', [GalleryImageController::class, 'destroy_image'])->name('gallery.destroy_image');

    Route::post('gallery-section', [GalleryImageSectionController::class, 'store'])->name('gallery-section.store');
    Route::put('gallery-section/{id}', [GalleryImageSectionController::class, 'update'])->name('gallery-section.update');
    Route::delete('gallery-section/{id}', [GalleryImageSectionController::class, 'destroy'])->name('gallery-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:section check'])->prefix('admin')->group(function () {
    Route::get('contact-info/create/{style?}', [ContactInfoController::class, 'create'])->name('contact-info.create');
    Route::post('contact-info', [ContactInfoController::class, 'store'])->name('contact-info.store');
    Route::get('contact-info/{id}/edit', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('contact-info/{id}', [ContactInfoController::class, 'update'])->name('contact-info.update');
    Route::delete('contact-info/{id}', [ContactInfoController::class, 'destroy'])->name('contact-info.destroy');
    Route::delete('contact-info-checked', [ContactInfoController::class, 'destroy_checked'])->name('contact-info.destroy_checked');
    Route::delete('contact-info/image/{id}', [ContactInfoController::class, 'destroy_image'])->name('contact-info.destroy_image');

    Route::post('contact-info-section', [ContactInfoSectionController::class, 'store'])->name('contact-info-section.store');
    Route::put('contact-info-section/{id}', [ContactInfoSectionController::class, 'update'])->name('contact-info-section.update');
    Route::delete('contact-info-section/{id}', [ContactInfoSectionController::class, 'destroy'])->name('contact-info-section.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:section check'])->prefix('admin')->group(function () {
    Route::get('map/create', [MapController::class, 'create'])->name('map.create');
    Route::post('map', [MapController::class, 'store'])->name('map.store');
    Route::put('map/{id}', [MapController::class, 'update'])->name('map.update');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS',  'permission:contact message check'])->prefix('admin')->group(function () {
    Route::get('contact-message', [ContactMessageController::class, 'index'])->name('contact-message.index');
    Route::put('contact-message/{id}', [ContactMessageController::class, 'update'])->name('contact-message.update');
    Route::patch('contact-message/mark_all', [ContactMessageController::class, 'mark_all_read_update'])->name('contact-message.mark_all_read_update');
    Route::delete('contact-message/{id}', [ContactMessageController::class, 'destroy'])->name('contact-message.destroy');
});
// End Site Admin Panel Route

Route::post('admin/demo-mode', [DemoModeController::class, 'update_demo_mode'])->name('admin.demo_mode');;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/change-password', [ProfileController::class, 'change_password_edit'])->name('profile.change_password_edit');
    Route::put('profile/change-password/update', [ProfileController::class, 'change_password_update'])->name('profile.change_password_update');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('language', [LanguageController::class, 'store'])->name('language.store');
    Route::get('language/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit');
    Route::patch('language/language-select', [LanguageController::class, 'update_language'])->name('language.update_language');
    Route::patch('language/processed-language', [LanguageController::class, 'update_processed_language'])->name('language.update_processed_language');
    Route::put('language/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::patch('language/update_display_dropdown/{id}', [LanguageController::class, 'update_display_dropdown'])->name('language.update_display_dropdown');
    Route::delete('language/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');
});

Route::get('language/set-locale/{language_id}/{site_url?}', [LanguageController::class, 'set_locale'])
    ->name('language.set_locale')->middleware('XSS');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS'])->prefix('admin')->group(function () {

    Route::get('language-keyword-for-adminpanel/create/{id}', [LanguageKeywordController::class, 'create'])
        ->name('language-keyword-for-adminpanel.create');
    Route::get('language-keyword-for-frontend/frontend-create/{id}', [LanguageKeywordController::class, 'frontend_create'])
        ->name('language-keyword-for-frontend.frontend_create');

    Route::post('panel-keyword', [LanguageKeywordController::class, 'store_panel_keyword'])
        ->name('panel-keyword.store_panel_keyword');
    Route::put('panel-keyword', [LanguageKeywordController::class, 'update_panel_keyword'])
        ->name('panel-keyword.update_panel_keyword');

    Route::post('frontend-keyword', [LanguageKeywordController::class, 'store_frontend_keyword'])
        ->name('frontend-keyword.store_frontend_keyword');
    Route::put('frontend-keyword', [LanguageKeywordController::class, 'update_frontend_keyword'])
        ->name('frontend-keyword.update_frontend_keyword');

});

Route::post('site_url', [SiteUrlController::class, 'index'])
    ->name('site-url.index');

Route::get('go-to-site-url/{site_url?}', [GoToSiteUrlController::class, 'index'])
    ->name('go-to-site-url-public-index.index');

Route::get('go-to-site-url/{site_url?}/{slug?}', [GoToSiteUrlController::class, 'index_2'])
    ->name('go-to-site-url.index');

Route::get('go-to-site-url/{site_url?}/{segment2?}/{slug?}', [GoToSiteUrlController::class, 'index_3'])
    ->name('go-to-site-url-language.index');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'XSS', 'permission:clear cache check'])->prefix('admin')->group(function () {
    Route::get('clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('dashboard')
            ->with('success','content.created_successfully');
    });
});

// start error 404
Route::any('{catchall}', [ErrorPageController::class, 'not_found'])->where('catchall', '.*');
// end error 404
