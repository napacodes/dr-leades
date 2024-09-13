<?php

namespace Database\Seeders;

use App\Models\Admin\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create data
        Language::create([
            'language_name' => 'English',
            'language_code' => 'en',
            'direction' => 0,
            'status' => 1,
            'display_dropdown' => 1,
            'default_site_language' => 1
        ]);
    }
}
