<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'team_slug' => [
                'source' => 'name',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => true
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'category_id',
        'style',
        'category_name',
        'section_image',
        'name',
        'job',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'team_slug',
        'status',
        'order',
    ];

    public function team_category()
    {
        return $this->belongsTo('App\Models\Admin\TeamCategory','category_id','id');
    }
}
