<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorOption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color_option',
        'main_color',
        'secondary_color',
        'scroll_button_color',
        'bottom_button_color',
        'bottom_button_hover_color',
        'side_button_color',
        'type',
    ];
}
