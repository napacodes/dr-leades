<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottomButtonWidget extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'button_name',
        'phone',
        'status',
        'button_name_2',
        'whatsapp',
        'status_whatsapp',
    ];
}
