<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
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
        'section_image',
        'section_image_2',
        'section_image_3',
        'title',
        'description',
        'youtube_video_url',
        'button_name',
        'button_url',
        'button_name_2',
        'button_url_2',
    ];
}
