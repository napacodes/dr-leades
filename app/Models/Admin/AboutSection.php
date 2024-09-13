<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'style',
        'video_type',
        'video_url',
        'section_image',
        'section_title',
        'title',
        'description',
        'button_name',
        'button_url',
        'button_name_2',
        'cv_file',
    ];
}
