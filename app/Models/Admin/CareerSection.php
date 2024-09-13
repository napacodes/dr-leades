<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'section_title',
        'title',
        'button_name',
        'button_url',
        'company_title',
        'company_description',
        'company_contact_title',
        'email',
        'phone',
        'address',
        'section_item',
        'paginate_item',
    ];
}
