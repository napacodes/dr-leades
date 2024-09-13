<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'portfolio_id',
        'section_image',
        'description',
        'breadcrumb_status',
        'custom_breadcrumb_image',
        'meta_description',
        'meta_keyword',
    ];
}
