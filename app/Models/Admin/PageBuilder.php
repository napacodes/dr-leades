<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBuilder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_uri',
        'page_name_id',
        'page_name',
        'default_item',
        'updated_item',
        'breadcrumb_title',
        'breadcrumb_item',
        'breadcrumb_status',
        'custom_breadcrumb_image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'order',
        'segment_count',
        'is_default',
        'status',
    ];

    public function page_name()
    {
        return $this->belongsTo('App\Models\Admin\PageName','page_name_id','id');
    }
}
