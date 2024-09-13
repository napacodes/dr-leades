<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
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
            'footer_slug' => [
                'source' => 'title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => false
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
        'category_name',
        'title',
        'url',
        'status',
        'order',
        'footer_slug',
    ];

    public function footer_category()
    {
        return $this->belongsTo('App\Models\Admin\footerCategory','category_id','id');
    }
}
