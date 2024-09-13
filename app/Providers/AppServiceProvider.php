<?php

namespace App\Providers;

use App\Models\Admin\ContactMessage;
use App\Models\Admin\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bootstrap pagination
        Paginator::useBootstrapFive();

        $demo_mode = 'off'; // on/off
        View::share('demo_mode', $demo_mode);


        if (Schema::hasTable('languages')) {

            // Retrieve a models
            $languages = Language::get();
            $display_dropdowns = Language::where('display_dropdown', 1)->get();
            $data_language = Language::where('status', 1)->first();

            View::share('languages', $languages);
            View::share('display_dropdowns', $display_dropdowns);
            View::share('data_language', $data_language);

            $language = Language::where('default_site_language', 1)->first();

            if (isset($language)) {

                View::share('language', $language);

            }

        }

        if (Schema::hasTable('contact_messages')) {
            // Retrieve messages
            $general_unread_messages = ContactMessage::where('read', 0)->orderBy('id', 'desc')->take(4)->get();
            $general_unread_message_count = ContactMessage::where('read', 0)->get();
            View::share('general_unread_messages', $general_unread_messages);
            View::share('general_unread_message_count', $general_unread_message_count);
        }



    }
}
