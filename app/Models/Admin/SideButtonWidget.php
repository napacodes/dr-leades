<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideButtonWidget extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_media',
        'link',
        'status',
        'contact',
        'email_or_whatsapp',
        'status_whatsapp',
        'phone',
        'status_phone',
    ];
}
