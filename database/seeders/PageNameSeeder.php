<?php

namespace Database\Seeders;

use App\Models\Admin\PageName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create data
        PageName::insert([
            [
                'page_name' => 'public-homepage-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'homepage-2-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'homepage-3-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'homepage-4-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'about-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'service-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'service-detail-show',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'service-category-index',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 2,
                'order' => 0,
            ],
            [
                'page_name' => 'faq-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'gallery-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'team-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'team-category-index',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 2,
                'order' => 0,
            ],
            [
                'page_name' => 'portfolio-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'portfolio-detail-show',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'portfolio-category-index',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 2,
                'order' => 0,
            ],
            [
                'page_name' => 'plan-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'career-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'career-detail-show',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'blog-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'blog-detail-show',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'blog-category-index',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 2,
                'order' => 0,
            ],
            [
                'page_name' => 'blog-tag-index',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 2,
                'order' => 0,
            ],
            [
                'page_name' => 'blog-search-index',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 2,
                'order' => 0,
            ],
            [
                'page_name' => 'contact-index',
                'is_default' => 'yes',
                'page_builder' => 'yes',
                'segment_count' => 1,
                'order' => 0,
            ],
            [
                'page_name' => 'page-detail-show',
                'is_default' => 'yes',
                'page_builder' => 'no',
                'segment_count' => 1,
                'order' => 0,
            ]


        ]);
    }
}
