<?php


use App\Models\Admin\FrontendKeyword;
use App\Models\Admin\Language;


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $frontend_keywords = FrontendKeyword::where('language_id', $language_id_from_dropdown)->get();


} else {

    $language = Language::where('default_site_language', 1)->first();

    $frontend_keywords = FrontendKeyword::where('language_id', $language->id)->get();

}


if (isset($frontend_keywords)) {

    $keywords = [];
    foreach ($frontend_keywords as $frontend_keyword) {
        $keywords += [$frontend_keyword->key => $frontend_keyword->value];
    }

    return $keywords;
}
else {

    return [

        /*
        |--------------------------------------------------------------------------
        | Pagination Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are used by the paginator library to build
        | the simple pagination links. You are free to change them to anything
        | you want to customize your views to better match your application.
        |
        */

        // Frontend One Group Keyword
        'home' => 'Home',
        'name' => 'Name',
        'email' => 'Email',
        'phone' => 'Phone',
        'your_message' => 'Your message',
        'send_message' => 'Send Message',
        'read_more' => 'Read More',
        'view_details' => 'View Details',
        'enter_your_email' => 'Enter your email',
        'subscribe_now' => 'Subscribe Now',
        'search' => 'Search',
        'type_to_search' => 'Type to search...',
        'categories' => 'Categories',
        'recent_posts' => 'Recent Posts',
        'popular_tags' => 'Popular Tags',
        'tags' => 'Tags',
        'next_post' => 'Next Post',
        'prev_post' => 'Previous Post',
        'copy_link_and_share' => 'Copy Url and Share:',
        'share_on' => 'Share On: ',
        'nothing_found' => 'Nothing found.',
        'all_works' => 'All Works',
        'all' => 'All',
        'about_us' => 'About Us',
        'anonymous' => 'Anonymous',
        'all_services' => 'All Services',
        'all_teams' => 'All Teams',
        'all_blogs' => 'All Blogs',
        'all_portfolio' => 'All Portfolio',
        'recent_services' => 'Recent Services',
        'recent_portfolio' => 'Recent Portfolio',
        'recent_blogs' => 'Recent Blogs',
        'recommended' => 'Recommended',
        'address' => 'Address',
        'working_hour' => 'Working Hour',

    ];

}

