<?php

namespace Database\Seeders;

use App\Models\Admin\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create data
        Menu::insert([
            [
                'language_id' => 1,
                'menu_name' => 'Home',
                'uri' => '#',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_name' => 'About',
                'uri' => 'about',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_name' => 'Services',
                'uri' => '#',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_name' => 'Pages',
                'uri' => '#',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_name' => 'News',
                'uri' => '#',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_name' => 'Contact',
                'uri' => 'contact',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ]
        ]);
    }
}
