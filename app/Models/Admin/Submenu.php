<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'menu_id',
        'menu_name',
        'submenu_name',
        'uri',
        'url',
        'view',
        'order',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Admin\Menu','menu_id','id');
    }
}

