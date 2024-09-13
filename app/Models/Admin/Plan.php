<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'name',
        'tag',
        'currency',
        'price',
        'extra_text',
        'feature_list',
        'non_feature_list',
        'button_name',
        'button_url',
        'recommended',
        'order',
    ];

}
