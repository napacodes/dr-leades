<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'menu_name',
        'uri',
        'url',
        'view',
        'status',
        'order',
    ];

    public function submenus()
    {
        return $this->hasMany('App\Models\Admin\Submenu','menu_id','id');
    }
}
